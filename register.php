<?php
  include("./connect_db.php");

  include("./functions.php");

  // Het email is nu schoongemaakt en fraudebestendig
  $email = sanitize($_POST["email"]);

  // Maak een selectie query voor het ingevulde emailadres
  $sql = "SELECT * FROM `login` WHERE `email` = '$email'";

  // Vuur de query af op de database
  $result = mysqli_query($conn, $sql);

  // Tel het aantal resultaten uit de database voor dat emailadres
  if ( mysqli_num_rows($result) == 1 ) {
    echo '<div class="alert alert-info" role="alert">
            Uw emailadres bestaat al. Kies een ander emailadres...
          </div>';
          header("Refresh: 4; url=./index.php?content=registerform");
  } else {

  // Ik ga een ingewikkeld tijdelijk password verzinnen
  date_default_timezone_set("Europe/Amsterdam");
  $date = date('d-m-Y H:i:s');
  $part_of_email = substr($email,0,4);

  $password = password_hash($date.$part_of_email, PASSWORD_BCRYPT);

  // De hash van dit tijdelijke password gaat mee met de activatielink
  $password_hash = password_hash($password, PASSWORD_BCRYPT);

  // We maken onze insert-query
  $sql = "INSERT INTO `login` (`iduser`,
                               `email`,
                               `password`,
                               `userrole`)
                    VALUES    (NULL,
                               '$email',
                               '$password',
                               'customer')";

  $result = mysqli_query($conn,$sql);

  // Met mysqli_insert_id($conn) kun je het laatst gemaakte id opvragen uit de database
  $id = mysqli_insert_id($conn);
  // var_dump($result);

  if ($result) {
    $to = $email;
    $subject = "Activatielink www.ewatchshop.com";
    $message = '<!DOCTYPE html>
                <html>
                <head>
                  <title>Dit is een test</title>
                  <style>
                    body {background-color: rgb(240,240,240);}
                  </style>
                </head>
                <body>
                <h1>Beste klant,</h1>
                  <p>Bedankt voor het registreren op. Door op de onderstaande activatielink te klikken wordt het registratieproces voltooid.</p>
                  <p>
                    <a href="ewatchshop.com/index.php?content=createpassword&id=' . $id . '&pw=' . $password_hash . '">activeer uw account</a>
                  </p>
                  <p> Met vriendelijk groet,</p>
                  <p>Uw administrator</p>
                </body>
                </html>';

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: admin@loginregistration.am1b.org" . "\r\n";
    $headers .= "Cc: a@a.com; b@b.org" . "\r\n";
    $headers .= "Bcc: myboss@example.com" . "\r\n";

    mail($to,$subject,$message,$headers);

    echo '<div class="alert alert-success" role="alert">
            U heeft een email gekregen met een activatielink. Klik hierop om het registreren te voltooien
          </div>';
    header("Refresh: 4; url=./index.php?content=registerform");
  } else {
    echo '<div class="alert alert-danger" role="alert">
            Er is iets mis gegaan met de registratie, probeer het opnieuw.
          </div>';
    header("Refresh: 4; url=./index.php?content=registerform");

  }

}
?>
