<?php
	include ("connection.php");
	$userID = $_GET['userID'];
	$sql1="delete from users where id='$userID';";
	mysqli_query($con,$sql1);
	$sql2="delete from mealrecords where id='$userID';";
	mysqli_query($con,$sql2);
	$sql3="delete from paymentrecords where id='$userID';";
	mysqli_query($con,$sql3);
	header("Location: viewUsers.php");
?>