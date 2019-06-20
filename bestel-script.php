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
    
    echo $price_inc . "<br>";

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
    echo  $sql. "<br>";

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
 echo $sql. "<br>";
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
echo $sql . "<br>";
}

    header("Refresh: 1; ./index.php?content=track");
    


?>
