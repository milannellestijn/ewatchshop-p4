<?php
 



    include("./connect_db.php");

    include("./functions.php");

    
    $idorder = sanitize($_POST["idorder"]) ;
    $status = sanitize($_POST["status"]);

    $sql = "UPDATE `order` SET 
                    `status` = '$status'
            WHERE `idorder` = $idorder";

    mysqli_query($conn, $sql);
   

    header("Refresh: 1; ./index.php?content=orders");
    
?>
