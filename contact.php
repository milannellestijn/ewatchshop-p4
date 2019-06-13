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

    <title>Home</title>


&nbsp;

<form action="./insert.php" method="post">
  <div class="form-group">
    <label for="email">Email adres</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
  </div>
  <div class="form-group">
    <label for="voornaam">Voornaam</label>
    <input type="text" name="voornaam" class="form-control" id="voornaam" placeholder="Voornaam" required>
  </div>
  <div class="form-group">
    <label for="tussenvoegsel">Tussenvoegsel</label>
    <input type="text" name="tussenvoegsel" class="form-control" id="tussenvoegsel" placeholder="Tussenvoegsel">
  </div>
  <div class="form-group">
    <label for="achternaam">Achternaam</label>
    <input type="text" name="achternaam" class="form-control" id="achternaam" placeholder="Achternaam" required>
  </div>
  <div class="form-group">
    <label for="onderwerp">Onderwerp</label>
    <input type="text" name="onderwerp" class="form-control" id="onderwerp" placeholder="Onderwerp" required>
  </div>
  <div class="form-group">
    <label for="vraag">Uw vraag</label>
    <textarea class="form-control" name="vraag" id="vraag" rows="5" placeholder="Stel hier uw vraag" required></textarea>
  </div>
  <button type="submit" value="Submit" class="btn btn-primary">Verstuur</button>



</form>
  </body>
</html>
