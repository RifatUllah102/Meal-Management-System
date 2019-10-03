<?php 
	include "connection.php";
	session_start();
	$user_info_id="";
	if(!isset($_COOKIE['user_id']) && !isset($_SESSION['user_id'])){
		header("Location : index.php");
	} else {
		if(isset($_SESSION['user_id'])){
			$user_info_id =$_SESSION['user_id'];
		}
		if(isset($_COOKIE['user_id'])){
			$user_info_id =$_COOKIE['user_id'];
		}
	}
	
	$sql = "select * from users where user_id='$user_info_id';";
	$result = mysqli_query($con,$sql);
	$assoc = mysqli_fetch_assoc($result);
	$_SESSION['assoc'] = $assoc;
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>

</head>
<h1 align="center">Meal Management System...</h1>

<body style="background: #EBEBEB">
	<div style="height: 600px; width: 400px; border: 1px solid black; align-content: center; align-items: center;">
		<h2 align="center">Welcome <?php echo($assoc['name']);?></h2>
		<p align="center"><a href="profile.php">Profile</a></p>
		<p align="center"><a href="changePassword.php">Change Password</a></p>
		<p align="center"><a href="AddBazar.php">Add Bazar Cost</a></p>
		<?php
			if($assoc['is_admin']==1){
				echo("<p align='center'><a href='AddMeal.php'>Add Meal</a></p>"); //Have to keep Edit options
				echo("<p align='center'><a href='AddBill.php'> Add Bill</a></p>"); //Have to keep edit options
				echo("<p align='center'><a href='viewUsers.php'>View Users</a></p>");
				echo("<p align='center'><a href='View_Meal_details.php'>Meal Records</a></p>");
				echo("<p align='center'><a href='PaymentDetails.php'>All Payments</a></p>");
				echo("<p align='center'><a href='BazerDetails.php'>All Bazer</a></p>");
				echo("<p align='center'><a href='TotalBazer.php'>Total Bazer</a></p>");
			}
		?>
		<p align="center"><a href="logout.php">Logout</a></p>
		
	</div>

</body>
</html>