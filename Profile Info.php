<?php
	session_start();
	if(!isset($_SESSION['assoc'])){
		header("Location: index.php");
	}
	$all_infos = $_SESSION['assoc'];
?>
<html>
<head>
<meta charset="utf-8">
<title>Profile</title>
<style>
	table,tr,td {
		border:  1px solid black; 
		border-collapse: collapse;
	}
</style>
</head>

<body style="background: #EBEBEB">
	<TABLE>
		<tr>
			<td colspan="2">Profile</td>
		</tr>
		<tr>
			<td>ID/USER NAME</td>
			<td><?php echo($all_infos['user_id'])//user_name
			;?></td> 
		</tr>
		<tr>
			<td>NAME</td>
			<td><?php echo($all_infos['name']);?></td>
		</tr>
		<tr>
			<td>EMAIL</td>
			<td><?php echo($all_infos['email']);?></td>
		</tr>
		<tr>
			<td>ID</td>
			<td><?php 
					if($all_infos['is_admin']==1){
						echo("Admin");
					} else {
						echo("User");
					}
				?></td>
		</tr>
		<tr>
			<td colspan="2" style=" text-align: right"><a href="home.php">Go Home</a></td>
		</tr>
	</TABLE>
</body>
</html>