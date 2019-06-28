

<?php


$userrole = ['administrator'];
include("./security.php");

//We maken contact met de mysql-server
include("./connect_db.php");

// We includen de sanitize funtion om de $_POST waarden schoon te maken.
include("./functions.php");

// Dit is een select query om de records uit de tabel te halen
$sql = "SELECT * FROM `product`";


// vuur de query af op de database en je krijgt antwoord terug. stop dit $result
$result = mysqli_query($conn, $sql);





?>

<main class="container">

    <div class="row">
     <div class="col-12">
            <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Idproduct</th>
            <th scope="col">Naam</th>
            <th scope="col">Code</th>
            <th scope="col">Prijs</th>
            <th scope="col">Beschrijving</th>
            <th scope="col">Afbeelding</th>
            <th scope="col">Voorraad</th>
            <th scope="col">Verander</th>
            <th scope="col">Verwijder</th>

            </tr>
        </thead>

        <tbody>
            <?php
                        // $resultis niet leesbaar, we maken er een associatief array van
                        // var_dump($result);
                        // echo $sql;
                        while ($record = mysqli_fetch_assoc($result)) {
                        echo "<tr><th scope = 'row'>" . $record["idproduct"] . "</th>" .
                     "<td>" . $record["name"] . "</td>" .
                     "<td>" . $record["code"] . "</td>" .
                     "<td>" . $record["price"] . "</td>" .
                     "<td>" . $record["description"] . "</td>" .
                     "<td>" . $record["image"] . "</td>" .
                     "<td>" . $record["stock"] . "</td>" .



                    "<td>
                        <a href='./index.php?content=update_product&id=". $record["idproduct"] ."'>
                        <img src='./pictures/b_edit.png' alt='edit' style='width: 20px; height: 20px;'>
                        </a>
                        </td>
                     <td>
                        <a href='./index.php?content=delete_product&id=". $record["idproduct"] ."'>
                        <img src='./pictures/b_drop.png' alt='drop' style='width: 20px; height: 20px;'>
                        </a>
                        </td>
                         </tr>";
                         }
            ?>
        </tbody>
</table>
<a href="./index.php?content=product_add">
<button  class="btn btn-dark btn-lg btn-block">Maak Nieuwe</button>
</a>
     </div>
    </div>

    </main>
