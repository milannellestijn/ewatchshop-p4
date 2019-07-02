<?php
  $userrole = ['administrator'];
  include("./security.php");
?>

<?php
//We maken contact met de mysql-server
include("./connect_db.php");

// We includen de sanitize funtion om de $_POST waarden schoon te maken.
include("./functions.php");
$idorder =  sanitize($_GET["id"]);
// Dit is een select query om de records uit de tabel te halen
$sql = "SELECT * FROM `orderline` WHERE `idorder` = '$idorder'";
$result = mysqli_query($conn, $sql);





?>


  <div class="row">
     <div class="col-12">
            <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Idorderline</th>
            <th scope="col">Idorder</th>
            <th scope="col">Idproduct</th>
            <th scope="col">Naam product</th>
            <th scope="col">Hoeveelheid</th>
            <th scope="col">Prijs per product</th>
            <th scope="col">Totaal</th>
            </tr>
        </thead>

        <tbody>
            <?php
                        // $resultis niet leesbaar, we maken er een associatief array van
                        //var_dump($result);
                        while ($record = mysqli_fetch_assoc($result)) {
                          $idproduct = $record["idproduct"];
                          $sql2 = "SELECT * FROM `product` WHERE `idproduct` = '$idproduct'";
                          $result2 = mysqli_query($conn, $sql2);
                          $record2 = mysqli_fetch_assoc($result2);
                          

                        echo "<tr><th scope = 'row'>" . $record["idorderline"] . "</th>" .
                     "<td>" . $record["idorder"] . "</td>" .
                     "<td>" . $record["idproduct"] . "</td>" .
                     "<td>" . $record2["name"] . "</td>" .
                     "<td>" . $record["amount"] . "</td>" .
                     "<td>" . $record["price"] . "</td>" .
                     "<td>" . $record["total"] . "</td> </tr>"; }
            ?>
        </tbody>
</table>

   