

<?php

 include("./connect_db.php");

 include("./functions.php");


$id = sanitize($_GET["id"]);

 $sql = "SELECT * FROM `product` WHERE `id` = $id";

 $result = mysqli_query($conn, $sql);

 $record = mysqli_fetch_assoc($result);


?>
<form action="./update_producten-script.php" method="post">
    <input type="hidden" name="id" value="<?=$record['id']?>">
<input type="text" class="form-control" id="name" name="name" value="<?php echo $record["name"]; ?>" >
<input type="text" class="form-control" id="code" name="code" value="<?php echo $record["code"]; ?>" >
<input type="text" class="form-control" id="price" name="price" value="<?php echo $record["price"]; ?>" >
<input type="text" class="form-control" id="description" name="description" value="<?php echo $record["description"]; ?>" >
<input type="text" class="form-control" id="image" name="image" value="<?php echo $record["image"]; ?>" >

    <button type="submit" class="btn btn-primary">Verander</button>
</form>
