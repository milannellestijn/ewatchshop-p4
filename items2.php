



<?php

include('./connect_db.php');
$status="";
if (isset($_POST['idproduct']) && $_POST['idproduct']!=""){
$idproduct = $_POST['idproduct'];
echo $idproduct;
$result = mysqli_query(
$conn,
"SELECT * FROM `product` WHERE `idproduct`='$idproduct'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$idproduct = $row['idproduct'];
$price = $row['price'];
$image = $row['image'];

$cartArray = array(
	$idporudct=>array(
	'name'=>$name,
	'idproduct'=>$idproduct,
	'price'=>$price,
	'quantity'=>1,
    'image'=>$image,
    'description'=>$description,)
);

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($idproduct,$array_keys)) {
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
$result = mysqli_query($conn,"SELECT * FROM `product`");
while($row = mysqli_fetch_assoc($result)){

    echo "<div class='product_wrapper'>

    <input type='hidden' name='idproduct' value=".$row['idproduct']." />
    <div class='image'><img src='".$row['image']."' height='200' width='200' /></div>
    <div class='name'>".$row['name']."</div>
    <div class='price'>$".$row['price']."</div>
    <div class='price'>".$row['description']."</div>



    </div>";
        }
mysqli_close($conn);

?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>


</div>
