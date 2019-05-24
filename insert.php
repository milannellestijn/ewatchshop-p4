<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is coming from a form

	// var_dump($_POST); exit();
	//mysql credentials
	$mysql_host = "localhost";
	$mysql_username = "root";
	$mysql_password = "";
	$mysql_database = "ewatchshop";

	$id = 1;
	$voornaam = $_POST["voornaam"]; //set PHP variables like this so we can use them anywhere in code below
	$email = $_POST["email"];
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$emailErr = "Invalid email format";
	  }
	$achternaam = $_POST["achternaam"];
	$tussenvoegsel = $_POST["tussenvoegsel"];
	$onderwerp = $_POST["onderwerp"];
	$vraag = $_POST["vraag"];

	$conn = mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_database);

	$sql = "INSERT INTO `contact` (`id`, `voornaam`, `tussenvoegsel`, `achternaam`, `email`,  `onderwerp`, `vraag` )
							VALUES(NULL, '$voornaam', '$tussenvoegsel', '$achternaam', '$email', '$onderwerp', '$vraag')";

	mysqli_query($conn, $sql);

	header("Location: /index.php?content=contact");

	// $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

	// $statement = $mysqli->prepare("INSERT INTO `userdata` (`id`, `voornaam`, `tussenvoegsel`, `achternaam`, `email`,  `onderwerp`, `vraag` ) VALUES(?, ?, ?, ?, ?, ?, ?)"); //prepare sql insert query
	// //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
	// $statement->bind_param('issssss', $id, $voornaam, $tussenvoegsel, $achternaam, $email, $onderwerp, $vraag); //bind values and execute insert query

	// //print output text
	// print "Hello " . $voornaam . "!, we have received your message and email ". $email;
	// print "We will contact you very soon!";
}

?>
