<?php
 
 $userrole = ['administrator'];
include("./security.php");


    include("./connect_db.php");

    include("./functions.php");

    $id = sanitize($_POST["id"]);

    $email = sanitize($_POST["email"]) ;
    $userrole = sanitize($_POST["userrole"]) ;

    $sql = "UPDATE `login` SET 
                    `email` = '$email', 
                    `userrole` = '$userrole'
            WHERE `login` . `iduser` = $id;";


    mysqli_query($conn, $sql);
    

    header("Refresh: 1; ./index.php?content=gebruikersrollen");
?>