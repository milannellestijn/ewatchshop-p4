


	



	
<?php
include("./connect_db.php");

$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      }		
}
}
 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
?>

	
<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table table-bordered">
<thead class="thead-dark">
<tr>
<th></th>
<th scope="col">Product</th>
<th scope="col">Hoeveelheid</th>
<th scope="col">Prijs per unit</th>
<th scope="col">Totaal prijs product</th>
</tr>	
</thead>
  <tbody>
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td>
<img src='<?php echo $product["image"]; ?>' width="50" height="40" />
</td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name= 'code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit button' class='btn btn-dark btn-sm'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
<option selected value="<? echo $product['quantity'];?>"><?php echo $product["quantity"]; ?></option>
<option 
value="1">1</option>
<option 
value="2">2</option>
<option 
value="3">3</option>
<option 
value="4">4</option>
<option 
value="5">5</option>

<option 
value="6">6</option>
</select>
</form>
</td>
<td><?php echo "$".$product["price"]; ?></td>
<td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>Totaal bedrag: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>	
<br>
<br>	
<a href="./index.php?content=bestel">
<button type="button" class="btn btn-dark btn-lg  btn-block">Bestel</button>
</a>
  <?php
}else{
  echo "<h3>Your cart is empty!</h3> 
  ";
	}
?>
</div>
 
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>


</div>

