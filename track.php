

<?php

$userrole = ['customer', 'administrator'];
include("./security.php");
//We maken contact met de mysql-server
include("./connect_db.php");

// We includen de sanitize funtion om de $_POST waarden schoon te maken.
include("./functions.php");
$iduser = $_SESSION["id"];
//$iduser = isset($_SESSION['iduser']) ? $_SESSION['iduser'] : '';
// Dit is een select query om de records uit de tabel te halen
$sql = "SELECT * FROM `order` WHERE `iduser` = '$iduser'";

// vuur de query af op de database en je krijgt antwoord terug. stop dit $result
$result = mysqli_query($conn, $sql);

//echo $iduser;



?>
    <main class="container">
    <div class="jumbotron col-12">
            <h1 class="display-4">Al uw bestellingen</h1>
            <p class="lead">Druk op de groene knop om meer van de bestelling zien</p>
        </div>
	
    <div class="row">
     <div class="col-12">
            <table class="table table-hover ">
        <thead>
            <tr>
            <th scope="col">Idorder</th>
            <th scope="col">Datum</th>
            <th scope="col">Prijs Exclusief</th>
            <th scope="col">Prijs Inclusief</th>
            <th scope="col">Status</th>
            <th scope="col">Zie uw hele bestelling</th>
            </tr>
        </thead>

        <tbody>
            <?php
                        // $resultis niet leesbaar, we maken er een associatief array van
                        //var_dump($result);
                        while ($record = mysqli_fetch_assoc($result)) {
                        echo "<tr><th scope = 'row'>" . $record["idorder"] . "</th>" .
                     "<td>" . $record["date"] . "</td>" .
                     "<td>" . $record["price_ex"] . "</td>" .
                     "<td>" . $record["price_inc"] . "</td>" .
                     "<td>" . $record["status"] . "</td>
                    
                     <td>
                     <a href='./index.php?content=fullcustomerorder&id=". $record["idorder"] ."'>
                     <img src='./pictures/greenplus.png' alt='edit' style='width: 20px; height: 20px;'>
                     </a>
                     </td>
                 
                         </tr>";
                         }
            ?>
        </tbody>
</table>

     </div>
    </div>

    </main>

	