<?php
header("Location: submitted.html");
 
/* Make sure that code below does not get executed when we redirect. */
	$name = $_POST['name'];
	$age= $_POST['age'];
	$job = $_POST['job'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$class = $_POST['class'];
	$hope = $_POST['hope'];

	// Database connection
	$conn = new mysqli('localhost','root','','sijuhre_papa');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, age, job, email, phone, class, hope) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sississ", $name, $age, $job, $email, $phone, $class, $hope);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
exit;	
?>