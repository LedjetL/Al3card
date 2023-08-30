<?php

$name = $_POST['name1'];
$email = $_POST['email1'];
$username = $_POST['username1'];
$password = $_POST['password1'];

$conn = new mysqli('localhost','root','','HotelDB');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into customer(name, email, username, password) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name, $email, $username, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}

?>