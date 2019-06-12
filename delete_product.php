<?php
 
 include("./connect_db.php");

 include("./functions.php");

 
 

 $id = sanitize($_GET["id"]);

 $sql ="DELETE FROM `product` WHERE `product`.`id` = $id";

mysqli_query($conn ,$sql);

 header("Refresh: 5; ./index.php?content=producten");

?>
