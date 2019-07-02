
<?
$userrole = ['administrator'];
include("./security.php");
?>


<form action="./index.php?content=product_add-script" method="post">
<div class="card" style="width: 36rem;">

<label for="name">Naam</label>
<input type="text" class="form-control" id="name" name="name" placeholder="Name"  >

<label for="name">Code</label>
<input type="text" class="form-control" id="code" name="code" placeholder="SM000"  >

<label for="name">Prijs</label>
<input type="text" class="form-control" id="price" name="price" placeholder="100,00" >

<label for="name">Beschrijving</label>
<input type="text" class="form-control" id="description" name="description" placeholder="description"  >

<label for="name">Afbeelding</label>
<input type="text" class="form-control" id="image" name="image" placeholder="./pictures/x.jpg" >
<label for="name">Voorraad</label>
<input type="text" class="form-control" id="stock" name="stock" placeholder="12" >
<button type="submit" class="btn btn-dark btn-lg btn-block">Stuur op</button>
</div>
</form>