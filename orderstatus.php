<?php





 include("./connect_db.php");

 include("./functions.php");


$idorder = sanitize($_GET["id"]);

 $sql = "SELECT * FROM `order` WHERE `idorder` = $idorder";

 $result = mysqli_query($conn, $sql);

 $record = mysqli_fetch_assoc($result);


?>

<form action="./orderstatus-script.php" method="post">
<div class='card ' style='width: 21rem;'>
    <input type="hidden" name="idorder" value="<?=$record['idorder']?>">
<div class="form-group">
    <label for="exampleFormControlSelect1">Userrole</label>
    <select class="form-control" id="status" name="status">
    <option selected ><?php echo $record["status"]; ?></option>
    <option>onderweg</option>
    <option>afgeleverd</option>
    <option>betaalt</option>
   <option>gesorteerd</option>
    </select>


    <button type="submit" class="btn btn-primary">Verander</button>
    </div>
</form>