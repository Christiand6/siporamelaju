<?php
header("Location: submitted.html");
 
/* Make sure that code below does not get executed when we redirect. */
	$name = $_POST['name'];
	$age= $_POST['age'];
	$job = $_POST['job'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$nutrisi = $_POST['nutrisi'];
	$aktivitas_fisik = $_POST['aktivitas_fisik'];
	$tidur = $_POST['tidur'];
	$hope = $_POST['hope'];

	// Database connection
	$conn = new mysqli('localhost','u762787730_cdinata6','123OPEN456noerror','u762787730_LovelyShiny');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, age, job, email, phone, nutrisi, aktivitas_fisik, tidur,  hope) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sissiiiis", $name, $age, $job, $email, $phone, $nutrisi, $aktivitas_fisik, $tidur, $hope);
		$stmt->execute();
		echo "Connected Successfully";
		$stmt->close();
		$conn->close();
	}
exit;	
?>