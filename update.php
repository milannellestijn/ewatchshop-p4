<?php

 include("./connect_db.php");

 include("./functions.php");


$id = sanitize($_GET["id"]);

 $sql = "SELECT * FROM `login` WHERE `id` = $id";

 $result = mysqli_query($conn, $sql);

 $record = mysqli_fetch_assoc($result);


?>
<form action="./update_record.php" method="post">
<input type="hidden" name="id" value="<?=$record['id']?>">
<div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" value="<?php echo $record["email"]; ?>">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Userrole</label>
    <select class="form-control" id="userrole" name="userrole">
    <option selected ><?php echo $record["userrole"]; ?></option>
    <option>customer</option>
    <option>administrator</option>
    </select>

    <button type="submit" class="btn btn-primary">Verander</button>
</form>