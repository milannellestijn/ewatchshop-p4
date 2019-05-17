<?php

// include("./items2.php"); 
include("./dbcontroller.php"); 
$db_handle = new DBController();
?>

<div class="row">
	<div >Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		
			
			<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="col-lg-4 col-md-6 mb-4">
   			<div class="card h-100">
     		<div><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
     		<div class="card-body">
        	<h4 class="card-title">
            <a><?php echo $product_array[$key]["name"]; ?></a>
        	</h4>
        	<h5><?php echo "$".$product_array[$key]["price"]; ?></h5>
       	 	<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
      		</div>
     		<div class="card-footer">
	 		<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
        	<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
      		</div>
    		</div>
  			</div>
  			</form>
			
			
	<?php
		}
	}
	?>
</div>
</BODY>