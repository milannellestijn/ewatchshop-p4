<?php




    include("./connect_db.php");

    include("./functions.php");

    
    $name = sanitize($_POST["name"]) ;
    $code = sanitize($_POST["code"]) ;
    $description = sanitize($_POST["description"]) ;
    $price = sanitize($_POST["price"]);
    $image = sanitize($_POST["image"]);
    $stock = sanitize($_POST["stock"]);

    $sql = "INSERT INTO `product` (
                    `idproduct`,
                    `name`, 
                    `code`,
                    `image`, 
                    `price` ,
                    `description`,
                    `stock`) VALUES (NULL, '$name', '$code', '$image', '$price', '$description', '$stock')";

    mysqli_query($conn, $sql);
   
    var_dump($_POST);

    header("Refresh: 100; ./index.php?content=producten");
    
?>