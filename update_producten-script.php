<?php
 

    include("./connect_db.php");

    include("./functions.php");

    
    $id = sanitize($_POST["id"]) ;
    $name = sanitize($_POST["name"]) ;
    $code = sanitize($_POST["code"]) ;
    $description = sanitize($_POST["description"]) ;
    $price = sanitize($_POST["price"]);
    $image = sanitize($_POST["image"]);


    $sql = "UPDATE `product` SET 
                    `name` = '$name', 
                    `code` = '$code',
                    `image` = '$image',
                    `price` = '$price',
                    `description` = '$description'
            WHERE `id` = $id";

    mysqli_query($conn, $sql);
    

    header("Refresh: 2; ./index.php?content=producten");
    
?>
