<?
include("./connect_db.php");


$id = isset($_SESSION['iduser']) ? $_SESSION['iduser'] : '';

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

</td>
<td><?php echo $product["quantity"]; ?></td>

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
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>



<form action="./index.php?content=bestel-script" method="post">
<?php
foreach ($_SESSION["shopping_cart"] as $product){
?>
<input type="hidden" name="idproduct" value="<?php echo $product["idproduct"]; ?>">
<input type="hidden" name="amount" value="<?php echo $product["quantity"]; ?>">

<?php } ?>
  <div class="form-row">
  <input type="hidden" name="iduser" value="<?= $_SESSION["id"]?>">
    <div class="form-group col-md-5">
      <label for="inputPassword4">Voornaam</label>
      <input type="text" class="form-control" id="firstname"  name="firstname" placeholder="Pieter" required>
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">Tussenvoegsel</label>
      <input type="text" class="form-control" id="infix" name="infix" placeholder="van de" >
    </div>
    <div class="form-group col-md-5">
      <label for="inputPassword4">Achternaam</label>
      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Koning" required>
    </div>
  </div>

  <div class="form-row">
  <div class="form-group">
    <label for="inputAddress">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="06123456" required>
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-5">
    <label for="inputAddress2">Aderres</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="straat 123" required>
  </div>
    <div class="form-group col-md-5">
      <label for="inputCity">Stad</label>
      <input type="text" class="form-control" id="city" name="city" placeholder="Amsterdam" required>
    </div>
    <div class="form-group col-md-1">
      <label for="inputZip">Postcode</label>
      <input type="text" class="form-control" id="postalcode" name="postalcode" placeholder="1111AA" required>
    </div>
</div>
  
  <div class="form-row">
  <button type="submit" class="btn btn-dark">Bestel</button>
</div>
</form>
<?

?>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
