<?php
	session_start();// Starting Session
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	//$conn = mysql_connect("localhost", "root", "");
	require '../config/db_connect.php';
	// Selecting Database
	//$db = mysqli_select_db($conn , "hms");
	// Storing Session
	$user_check=$_SESSION['username'];
	//echo ($user_check);
	// SQL Query To Fetch Complete Information Of User
	$sql = "SELECT * FROM students WHERE college_id='$user_check'";
	$result = mysqli_query($conn,$sql);
	$student = mysqli_fetch_assoc($result);
	$name = $student['college_id'];
	if(!isset($name)){
		//echo 'not set';
		mysqli_close($conn); // Closing Connection
		header('Location: index.php'); // Redirecting To Home Page
	}
?>


<!DOCTYPE HTML>
<html>
	<?php include('templates/header.php'); ?>

	<div class="z-depth-0 center">
			<h4><?php echo htmlspecialchars($student['first_name']);echo(" ");echo htmlspecialchars($student['last_name']);?></h4>
			<h5><?php echo htmlspecialchars($student['college_id'])?></h5>
			<h5><?php echo htmlspecialchars($student['mobile'])?></h5>
			<h5><?php echo htmlspecialchars($student['email'])?></h5>
	</div>
	<div class="center">
		<a href="../logout.php"><button type="submit" name="logout" class="btn brand z-depth-0">Log Out</button></a>
	</div>

	<?php include('templates/footer.php'); ?>
</html>
