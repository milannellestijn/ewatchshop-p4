<?php




    include("./connect_db.php");

    include("./functions.php");

    // gegevens
    $iduser = sanitize($_POST["iduser"]) ;
    $firstname = sanitize($_POST["firstname"]) ;
    $infix = sanitize($_POST["infix"]) ;
    $lastname= sanitize($_POST["lastname"]) ;
    $phone = sanitize($_POST["phone"]) ;
    $address = sanitize($_POST["address"]) ;
    $postalcode = sanitize($_POST["postalcode"]) ;
    $city = sanitize($_POST["city"]) ;
    
    // producten
    

    // extra info
    date_default_timezone_set("Europe/Amsterdam");
    $date = date('Y-m-d H:i:s');

   // $product["price"]*$product["quantity"]; 
   // $total_price += ($product["price"]*$product["quantity"]);
  //  $tot += ($product["price"]*$product["quantity"]);

    $tot = 0;
  foreach ($_SESSION["shopping_cart"] as $product){
    $product["price"]*$product["quantity"]; 
    $tot += ($product["price"]*$product["quantity"]);

  }
    
    $price_ex = $tot * 0.79;
    $price_inc = $tot;
    
   // echo $price_inc . "<br>";

    // gegevens
    $sql = "UPDATE `login` SET 
                    `firstname` = '$firstname', 
                    `infix` = '$infix',
                    `lastname` = '$lastname',
                    `phone` = '$phone',
                    `address` = '$address',
                    `postalcode` = '$postalcode',
                    `city` = '$city'
            WHERE `login` . `iduser` = $iduser;";

    mysqli_query($conn, $sql);
  // echo  $sql. "<br>";

    // de order
    $sql = "INSERT INTO `order` (
        `idorder`,
         `iduser`, 
         `date`, 
         `price_ex`, 
         `price_inc`, 
         `status`) 
         VALUES (
            NULL, 
         '$iduser', 
         '$date',
          '$price_ex', 
          '$price_inc', 
          'betaalt');";

 mysqli_query($conn, $sql);
 //echo $sql. "<br>";
 $idorder = mysqli_insert_id($conn);

 foreach ($_SESSION["shopping_cart"] as $product){
       
       $total_price = $product["price"]*$product["quantity"]; 

       

      $sql2 = "SELECT * FROM `product` WHERE `idproduct` = '$product[idproduct]'";

      $result2 = mysqli_query($conn, $sql2);
      $record2 = mysqli_fetch_assoc($result2);

      $af = $record2["stock"] - $product["quantity"];

      $sql = "UPDATE `product` SET `stock` = '$af' WHERE `product`.`idproduct` = '$product[idproduct]';";
      mysqli_query($conn,$sql);

   // $sql = "SELECT `idproduct` FROM `product` WHERE `code` = '$product[code]'";
  //  $result = mysqli_query($conn, $sql);
   // $idproduct = $result["code"];
   // while($row = $result->fetch_assoc()) {
    //    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            
     //           }
       // $idproduct = $row["code"];
    // de producten van de orer

    $sql=  "INSERT INTO `orderline` (
                `idorderline`,
                 `idorder`,
                  `idproduct`,
                   `amount`,
                    `price`,
                     `total`) 
                     VALUES (
                         NULL,
                      '$idorder',
                       '$product[idproduct]',
                        '$product[quantity]',
                         '$product[price]',
                          ' $total_price');";

mysqli_query($conn,$sql);
// echo $sql . "<br>";
}

  //  header("Refresh: 1; ./index.php?content=track");
  //  unset($_SESSION["shopping_cart"])


?>

<?php // PDF

require('fpdf.php');
//require('classes/fpdf/fpdf.php'); 
class PDF extends FPDF {
 
function Header() {
    $this->SetFont('Times','',12);
    $this->SetY(0.25);
    $this->Cell(0, .25, "John Doe ".$this->PageNo(), 'T', 2, "R");
    //reset Y
    $this->SetY(1);
}
 
function Footer() {
//This is the footer; it's repeated on each page.
//enter filename: phpjabber logo, x position: (page width/2)-half the picture size,
//y position: rough estimate, width, height, filetype, link: click it!
    $this->Image("./pictures/green.png", (8.5/2)-1.5, 9.8, 3, 1, "JPG", "https://www.phpjabbers.com");
}
 
}
 
//class instantiation
$pdf=new PDF("P","in","Letter");
 
$pdf->SetMargins(1,1,1);
 
$pdf->AddPage();
$pdf->SetFont('Times','',12);
 
$lipsum1="Bedankt voor het bestellen";
  
$lipsum2="Nibh lectus, pede fusce ullamcorper vel porttitor.";
  
$lipsum3 ="Duis maecenas et curabitur, felis dolor.";
  
$pdf->SetFillColor(240, 100, 100);
$pdf->SetFont('Times','BU',12);
  
//Cell(float w[,float h[,string txt[,mixed border[,
//int ln[,string align[,boolean fill[,mixed link]]]]]]])
$pdf->Cell(0, .25, "lipsum", 1, 2, "C", 1);
  
$pdf->SetFont('Times','',12);
//MultiCell(float w, float h, string txt [, mixed border [, string align [, boolean fill]]])
$pdf->MultiCell(0, 0.5, $lipsum1, 'LR', "L");
$pdf->MultiCell(0, 0.25, $lipsum2, 1, "R");
$pdf->MultiCell(0, 0.15, $lipsum3, 'B', "J");
 
$pdf->AddPage();
$pdf->Write(0.5, $lipsum1.$lipsum2.$lipsum3);
  
$pdf->Output();

// END PDF
?> 





<?php // EMAIL
  

  // Het email is nu schoongemaakt en fraudebestendig
 // $sql = "SELECT `email` FROM `login` WHERE `iduser` = '$iduser'";

 // $email = mysqli_query($conn, $sql);


  // Maak een selectie query voor het ingevulde emailadres
  $sql = "SELECT * FROM `login` WHERE `iduser` = '$iduser'";
 // echo $sql . "<br>";
  
  // Vuur de query af op de database
  $result = mysqli_query($conn, $sql);
  $record = mysqli_fetch_assoc($result);
  $email = $record["email"];
  // Tel het aantal resultaten uit de database voor dat emailadres
  if ( mysqli_num_rows($result) == 1 )  {

 
 
  $part_of_email = substr($email,0,4);


 
  // Met mysqli_insert_id($conn) kun je het laatst gemaakte id opvragen uit de database
 
  // var_dump($result);

  if ($result) {
    $to = $email;
    $subject = "Bestelling compleet";
    $message = '<!DOCTYPE html>
                <html>
                <head>
                  <title>Dit is een test</title>
                  <style>
                    body {background-color: rgb(240,240,240);}
                  </style>
                </head>
                <body>
                <h1>Beste klant,</h1>
                  <p>Bedankt voor het het besttellen op onze website. U kunt uw besttelling volgen op de website als u ingeloged bent</p>
                  <p>
                    <a href="www.ewatchshop.com/index.php?content=loginform">Log in</a>
                  </p>
                  <p> Met vriendelijk groet,</p>
                  <p>Uw administrator</p>
                </body>
                </html>';
                

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: admin@loginregistration.am1b.org" . "\r\n";
    $headers .= "Cc: a@a.com; b@b.org" . "\r\n";
    $headers .= "Bcc: myboss@example.com" . "\r\n";

    mail($to,$subject,$message,$headers);

    echo '<div class="alert alert-success" role="alert">
           U heeft uw mail van bevesteging van de bestelling binnen gekregen
          </div>';
          

    unset($_SESSION["shopping_cart"]);
    header("Refresh: 4; url=./index.php?content=track");
  } else {
    echo '<div class="alert alert-danger" role="alert">
            Er is iets mis gegaan met het besttelen, probeer het opnieuw.
          </div>';
    header("Refresh: 4; url=./index.php?content=shopcart");
    
  }

}

unset($_SESSION["shopping_cart"])


?>

