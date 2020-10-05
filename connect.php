<?php
header("Location: submitted.html");
 
/* Make sure that code below does not get executed when we redirect. */
	$name = $_POST['name'];
	$age= $_POST['age'];
	$job = $_POST['job'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$class = $_POST['class'];
	$chk="";
	$hope = $_POST['hope'];

	// Database connection
	$conn = new mysqli('localhost','root','','sijuhre_papa');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, age, job, email, phone, hope) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sissis", $name, $age, $job, $email, $phone, $class, $hope);
		foreach($class as $chk1)  
		{  
		  $chk .= $chk1.",";  
		}  
		$in_ch=mysqli_query($con,"insert into registration(class) values ('$chk')");
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
exit;	
?>