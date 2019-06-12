<?php
 

    include("./connect_db.php");

    include("./functions.php");

    
    $name = sanitize($_POST["name"]) ;
    $code = sanitize($_POST["code"]) ;
    $description = sanitize($_POST["description"]) ;
    $price = sanitize($_POST["price"]);
    $image = sanitize($_POST["image"]);


    $sql = "INSERT INTO `product` (
                    `id`,
                    `name`, 
                    `code`,
                    `image`, 
                    `price` ,
                    `description`) VALUES (NULL, '$name', '$code', '$image', '$price', '$description')";

    mysqli_query($conn, $sql);
   

    header("Refresh: 2; ./index.php?content=producten");
    
?>