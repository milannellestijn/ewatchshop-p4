<?php
 $userrole = ['administrator'];
 include("./security.php");

 include("./connect_db.php");

 include("./functions.php");

 
 

 $id = sanitize($_GET["id"]);

 $sql ="DELETE FROM `login` WHERE `login`.`iduser` = $id";

mysqli_query($conn ,$sql);

 header("Refresh: 1; ./index.php?content=gebruikersrollen");

?>
