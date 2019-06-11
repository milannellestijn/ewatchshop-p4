<?php
  $userrole = ['administrator'];
  include("./security.php");
?>

<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ewatchshop";

  $conn = mysqli_connect($server, $username, $password, $dbname);

  $sql = "SELECT * FROM `contact`";

  $result = mysqli_query($conn, $sql);
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- persoonlijke stylesheets -->
    <link rel="stylesheet" type="text/css" href="./css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Contact Admin</title>
  </head>
  <body>

&nbsp;

    <main class="container">
        <div class="jumbotron col-12">
            <h1 class="display-4">Helpdesk</h1>
            <p class="lead">hieronder zie je de vragen van mensen.</p>
        </div>


        <div class="row">
        <div class="col-12">
        <table class="table table-hover">
        <tbody>
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Voornaam</th>
                    <th scope="col">Tussenvoegsel</th>
                    <th scope="col">Achternaam</th>
                    <th scope="col">Email</th>
                    <th scope="col">Onderwerp</th>
                    <th scope="col">vraag</th>
                </tr>
            </thead>
            <tbody>
             <?php
               while ( $record = mysqli_fetch_assoc($result)) {
                echo  " <tr><th scope='row'>" . $record["id"] . "</th>" .
                "<td>" . $record["voornaam"] . "</td>" .
                "<td>" . $record["tussenvoegsel"] . "</td>" .
                "<td>" . $record["achternaam"] . "</td>" .
                "<td>" . $record["email"] . "</td>" .
                "<td>" . $record["onderwerp"] . "</td>" .
                "<td>" . $record["vraag"] . "</td></tr>";

              }
             ?>


            </tbody>
        </table>
      </div>
    </div>
        <br>
        <br>

    </main>
</html>
