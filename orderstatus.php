<?php


$userrole = ['administrator'];
include("./security.php");


 include("./connect_db.php");

 include("./functions.php");


$idorder = sanitize($_GET["id"]);

 $sql = "SELECT * FROM `order` WHERE `idorder` = $idorder";

 $result = mysqli_query($conn, $sql);

 $record = mysqli_fetch_assoc($result);


?>

<form action="./index.php?content=orderstatus-script" method="post">
<div class='card ' style='width: 21rem;'>
    <input type="hidden" name="idorder" value="<?=$record['idorder']?>">
<div class="form-group">
    <label for="exampleFormControlSelect1">Status</label>
    <select class="form-control" id="status" name="status">
    <option selected ><?php echo $record["status"]; ?></option>
    <option>onderweg</option>
    <option>afgeleverd</option>
    <option>betaalt</option>
   <option>gesorteerd</option>
    </select>


    <button type="submit" class="btn btn-dark  btn-lg btn-block">Verander</button>
    </div>
</form>