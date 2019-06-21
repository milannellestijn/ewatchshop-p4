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
    
    $price_inc = $tot * 1.21;
    $price_ex = $tot;
    
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
//echo $sql . "<br>";
}

  //  header("Refresh: 1; ./index.php?content=track");
  //  unset($_SESSION["shopping_cart"])


?>

<?php
  

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

