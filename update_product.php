

<?php





 include("./connect_db.php");

 include("./functions.php");


$id = sanitize($_GET["id"]);

 $sql = "SELECT * FROM `product` WHERE `idproduct` = $id";

 $result = mysqli_query($conn, $sql);

 $record = mysqli_fetch_assoc($result);


?>
<form action="./update_producten-script.php" method="post">
<div>
    <input type="hidden" name="id" value="<?=$record['idproduct']?>">
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
<input type="text" class="form-control" id="name" name="name" value="<?php echo $record["name"]; ?>" >
</div>
<div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
<input type="text" class="form-control" id="code" name="code" value="<?php echo $record["code"]; ?>" >
</div>
<div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
<input type="text" class="form-control" id="price" name="price" value="<?php echo $record["price"]; ?>" >
</div>
<div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" name="description" id="description" rows="3" ><?php echo $record["description"]; ?></textarea>
    
</div>
<div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
<input type="text" class="form-control" id="image" name="image" value="<?php echo $record["image"]; ?>" >
</div>
<div class="form-group">
    <label for="exampleFormControlTextarea1">Voorraad</label>
<input type="text" class="form-control" id="stock" name="stock" value="<?php echo $record["stock"]; ?>" >
</div>
    <button type="submit" class="btn btn-primary">Verander</button>
    </div>
</form>


