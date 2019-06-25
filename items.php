





<?php

include('./connect_db.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($conn,"SELECT * FROM `product` WHERE `code`='$code'");

$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$idproduct = $row['idproduct'];
$price = $row['price'];
$image = $row['image'];
$description = $row['description'];
 
$cartArray = array(
	$code=>array(
    'name'=>$name,
    'code'=>$code,
	'idproduct'=>$idproduct,
	'price'=>$price,
	'quantity'=>1,
    'image'=>$image,
    'description'=>$description)
);

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
	$status = "<div class='box' style='color:red;'>
	Product is already added to your cart!</div>";
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>

	
<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<!-- <div class="cart_div">
<a href="index.php?content=shopcart"><img src="cart-icon.png" /> Cart<span>
<?php //echo $cart_count; ?></span></a>
</div> -->
<?php
}
?>

<?php
$result = mysqli_query($conn,"SELECT * FROM `product`");
while($row = mysqli_fetch_assoc($result)){
    echo "<div class='product_wrapper'>
    <form method='post' action=''>
    <input type='hidden' name='code' value=".$row['code']." />
    <div class='image'><img src='".$row['image']."' height='200' width='200' /></div>
    <div class='name'>".$row['name']."</div>
    <div class='price'>$".$row['price']."</div>
    <div class='price'>".$row['description']."</div>
    <button type='submit' class='buy'>Buy Now</button>
    </form>
    </div>";
        }
mysqli_close($conn);
?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

