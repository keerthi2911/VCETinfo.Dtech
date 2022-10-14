<?php
	$firstName = $_POST['firstName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('sql6.freesqldatabase.com','sql6525760','yx7EVHzi6w','sql6525760');
if($conn->connect_error){
		// echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, gender, email,number, message) values(?, ?, ?, ?,?)");
		$stmt->bind_param("sssis", $firstName, $gender, $email,$number, $message);
	    $stmt->execute();
		// echo $execval;
		echo '<script>alert("Thank You..! Your Feedback is Valuable to Us"); location.replace(document.referrer);</script>';
		$stmt->close();
		$conn->close();
	}
?>
