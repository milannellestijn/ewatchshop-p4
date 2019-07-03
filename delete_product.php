<?php
 
 $userrole = ['administrator'];
 include("./security.php");

 include("./connect_db.php");

 include("./functions.php");

 
 

 $id = sanitize($_GET["id"]);

 $sql ="DELETE FROM `product` WHERE `product`.`idproduct` = $id";

mysqli_query($conn ,$sql);



 header("Refresh: 1; ./index.php?content=producten");

?>
