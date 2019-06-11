<?php
 

    include("./connect_db.php");

    include("./functions.php");

    $id = sanitize($_POST["id"]);

    $email = sanitize($_POST["email"]) ;
    $userrole = sanitize($_POST["userrole"]) ;

    $sql = "UPDATE `login` SET 
                    `email` = '$email', 
                    `userrole` = '$userrole'
            WHERE `login` . `id` = $id;";


    mysqli_query($conn, $sql);
    

    header("Refresh: 4; ./index.php?content=gebruikersrollen");
?>