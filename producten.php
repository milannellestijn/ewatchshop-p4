<?php include("./dbcontroller.php"); 
$db_handle = new DBController();
?>

<?php
$product = $db_handle->runQuery("SELECT * FROM `product` ");
	if (!empty($product)) { 
		foreach($product as $key=>$value){
	?>
    
 
<form action="./producten-script.php" method="post">
<div class="card" style="width: 18rem;">
<input type="hidden" name="id" value="<?=$product[$key]['id']?>">
<input type="text" class="form-control" id="name" name="name" value="<?php echo $product[$key]["name"]; ?>" >
<input type="text" class="form-control" id="code" name="code" value="<?php echo $product[$key]["code"]; ?>" >
<input type="text" class="form-control" id="price" name="price" value="<?php echo $product[$key]["price"]; ?>" >
<input type="text" class="form-control" id="description" name="description" value="<?php echo $product[$key]["description"]; ?>" >
<input type="text" class="form-control" id="image" name="image" value="<?php echo $product[$key]["image"]; ?>" >

<button type="submit" class="btn btn-primary">Stuur op</button>
</div>
</form>


      <?php
		}
	}
	?>
