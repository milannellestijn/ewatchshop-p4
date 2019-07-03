<?php

$userrole = ['administrator'];
include("./security.php");


 include("./connect_db.php");

 include("./functions.php");


$id = sanitize($_GET["id"]);

 $sql = "SELECT * FROM `login` WHERE `iduser` = $id";

 $result = mysqli_query($conn, $sql);

 $record = mysqli_fetch_assoc($result);


?>
<form action="./index.php?content=update_record" method="post">
<input type="hidden" name="id" value="<?=$record['iduser']?>">
<div class="form-group col-md-3">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" value="<?php echo $record["email"]; ?>">
  </div>
  
  <div class="form-group col-md-3">
    <label for="exampleFormControlSelect1">Userrole</label>
    <select class="form-control" id="userrole" name="userrole">
    <option selected ><?php echo $record["userrole"]; ?></option>
    <option>customer</option>
    <option>administrator</option>
    </select>
    <br>

    <button type="submit" class="btn btn-dark btn-lg">Verander</button>
    
</form>
