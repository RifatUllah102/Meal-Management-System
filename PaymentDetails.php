<!doctype html>
<?php 
	session_start();
	include("connection.php");
	if(!isset($_SESSION['user_id'])){
		header("Location: index.php");
	}
	$sql = "select * from paymentrecords;";
	$result= mysqli_query($con,$sql);
?>
<html>
<head>
<meta charset="utf-8">
<title>View Payment</title>
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
			<td style="text-align: center" colspan="2">Payment Records</td>
		</tr>
		<tr>
			<td>ID</td>
			<td>Bill</td>
		</tr>
		<?php
			while($all_user_info = mysqli_fetch_assoc($result)){
		?>
		<tr>
			<td><?php echo($all_user_info['id'])?></td>
			<td><?php echo($all_user_info['Bill'])?></td>
		</tr>
		<?php
			}
		?>
		
		<tr>
			<td colspan="2" style="text-align: right;"><a href="home.php">Go Home</a></td>
		</tr>
	</table>
</body>
</html>