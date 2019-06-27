<?php
 // $userrole = ['administrator'];
 // include("./security.php");
?>

<?php
//We maken contact met de mysql-server
include("./connect_db.php");

// We includen de sanitize funtion om de $_POST waarden schoon te maken.
include("./functions.php");

// Dit is een select query om de records uit de tabel te halen
$sql = "SELECT * FROM `order`";

// vuur de query af op de database en je krijgt antwoord terug. stop dit $result
$result = mysqli_query($conn, $sql);





?>
    <main class="container">

    <div class="row">
     <div class="col-12">
            <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">idorder</th>
            <th scope="col">iduser</th>
            <th scope="col">Datum</th>
            <th scope="col">Prijs exclusief</th>
            <th scope="col">Prijs inclusief</th>
            <th scope="col">Status</th>
            <th scope="col">Verander Status</th>
            <th scope="col">Zie hele bestelling</th>
            </tr>
        </thead>

        <tbody>
            <?php
                        // $resultis niet leesbaar, we maken er een associatief array van
                        //var_dump($result);
                        while ($record = mysqli_fetch_assoc($result)) {
                        echo "<tr><th scope = 'row'>" . $record["idorder"] . "</th>" .
                     "<td>" . $record["iduser"] . "</td>" .
                     "<td>" . $record["date"] . "</td>" .
                     "<td>" . $record["price_ex"] . "</td>" .
                     "<td>" . $record["price_inc"] . "</td>" .
                     "<td>" . $record["status"] . "</td>" .


                    "<td>
                        <a href='./index.php?content=orderstatus&id=". $record["idorder"] ."'>
                        <img src='./pictures/b_edit.png' alt='edit' style='width: 20px; height: 20px;'>
                        </a>
                        </td>

                        <td>
                        <a href='./index.php?content=fullorder&id=". $record["idorder"] ."'>
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