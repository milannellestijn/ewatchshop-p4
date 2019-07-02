<?php

$userrole = ['administrator'];
include("./security.php");

//We maken contact met de mysql-server
include("./connect_db.php");

// We includen de sanitize funtion om de $_POST waarden schoon te maken.
include("./functions.php");

// Dit is een select query om de records uit de tabel te halen
$sql = "SELECT * FROM `login` WHERE userrole !='root'";

// vuur de query af op de database en je krijgt antwoord terug. stop dit $result
$result = mysqli_query($conn, $sql);





?>
    <main class="container">

    <div class="row">
     <div class="col-12">
            <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Email</th>
            <th scope="col">Gebruikers Role</th>
            <th scope="col">Verander Gebruikers Role</th>
            <th scope="col">Verwijder</th>


            </tr>
        </thead>

        <tbody>
            <?php
                        // $resultis niet leesbaar, we maken er een associatief array van
                        //var_dump($result);
                        while ($record = mysqli_fetch_assoc($result)) {
                        echo "<tr><th scope = 'row'>" . $record["iduser"] . "</th>" .
                     "<td>" . $record["email"] . "</td>" .
                     "<td>" . $record["userrole"] . "</td>" .



                    "<td>
                        <a href='./index.php?content=update&id=". $record["iduser"] ."'>
                        <img src='./pictures/b_edit.png' alt='edit' style='width: 20px; height: 20px;'>
                        </a>
                        </td>
                     <td>
                        <a href='./index.php?content=delete&id=". $record["iduser"] ."'>
                        <img src='./pictures/b_drop.png' alt='drop' style='width: 20px; height: 20px;'>
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
