

<?php


$userrole = ['administrator'];
include("./security.php");


 include("./connect_db.php");

 include("./functions.php");


$id = sanitize($_GET["id"]);

 $sql = "SELECT * FROM `product` WHERE `idproduct` = $id";

 $result = mysqli_query($conn, $sql);

 $record = mysqli_fetch_assoc($result);


?>
<form action="./index.php?content=update_producten-script" method="post">
    <input type="hidden" name="id" value="<?=$record['idproduct']?>">
    <div class="row">
    <div class="form-group col-md-3">
    <label for="exampleFormControlTextarea1">Naam</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $record["name"]; ?>" >
    </div>
    <div class="form-group col-md-2">
    <label for="exampleFormControlTextarea1">Code</label>
    <input type="text" class="form-control" id="code" name="code" value="<?php echo $record["code"]; ?>" >
    </div>
    <div class="form-group col-md-2">
    <label for="exampleFormControlTextarea1">Prijs</label>
    <input type="text" class="form-control" id="price" name="price" value="<?php echo $record["price"]; ?>" >
    </div>
    </div>
    
    <div class="row">
    <div class="form-group col-md-7">
    <label for="exampleFormControlTextarea1">Beschrijving</label>
    <textarea class="form-control" name="description" id="description" rows="3" ><?php echo $record["description"]; ?></textarea>
    </div>
    </div>
    
    <div class="row">
    <div class="form-group col-md-6">
    <label for="exampleFormControlTextarea1">Afbeelding</label>
    <input type="text" class="form-control" id="image" name="image" value="<?php echo $record["image"]; ?>" >
    </div>
    <div class="form-group col-md-1">
    <label for="exampleFormControlTextarea1">Voorraad</label>
    <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $record["stock"]; ?>" >
    </div>
    </div>
    <button type="submit" class="btn btn-dark  btn-lg  ">Verander</button>
    </form>


