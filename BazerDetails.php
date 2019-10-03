<!doctype html>
<?php 
	session_start();
	include("connection.php");
	if(!isset($_SESSION['user_id'])){
		header("Location: index.php");
	}
	$sql = "SELECT * FROM bazarecords;";
	$result= mysqli_query($con,$sql);
?>
<html>
<head>
<meta charset="utf-8">
<title>View Bazer Records</title>
 	<style>
		table,tr,td {
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>
</head>

<body style="background: #EBEBEB">
	<table>
		<tr>
			<td style="text-align: center" colspan="3">Bazer List</td>
		</tr>
		<tr>
			<td>ID</td>
			<td>Bazer</td>
			<td>Date</td>
		</tr>
		<?php
			while($all_user_info = mysqli_fetch_assoc($result)){
		?>
		<tr>
			<td><?php echo($all_user_info['id'])?></td>
			<td><?php echo($all_user_info['Bazar'])?></td>
			<td><?php echo($all_user_info['Date'])?></td>
			
		</tr>
		<?php
			}
		?>
		
		<tr>
			<td colspan="3" style="text-align: right;"><a href="home.php">Go Home</a></td>
		</tr>
	</table>
</body>
</html>