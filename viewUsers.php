<!doctype html>
<?php 
	session_start();
	include("connection.php");
	if(!isset($_SESSION['user_id'])){
		header("Location: index.php");
	}
	$sql = "select * from users;";
	$result= mysqli_query($con,$sql);
	$userID=$_SESSION['user_id'];
	$sql2="select *from users where user_id='$userID';";
	$result2=mysqli_query($con,$sql2);
	$assoc2=mysqli_fetch_assoc($result2);
?>
<html>
<head>
<meta charset="utf-8">
<title>View Users</title>
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
			<td style="text-align: center" colspan="4">All Users</td>
		</tr>
		<tr>
			<td>ID</td>
			<td>NAME</td>
			<td>EMAIL</td>
			<td>USER TYPE</td>
		</tr>
		<?php
			while($all_user_info = mysqli_fetch_assoc($result)){
		?>
		<tr>
			<td><?php echo($all_user_info['user_id'])?></td>
			<td><?php echo($all_user_info['name'])?></td>
			<td><?php echo($all_user_info['email'])?></td>
			<td><?php 
				if($all_user_info['is_admin']==1){
					echo("Admin");
				} else {
					echo("User");
				}
				?></td>
			<?php 
				if($assoc2['is_admin']==1){?>
					<td><a href="deleteUser.php?userID=<?php echo($all_user_info['id']);?>">Delete</a></td>
				<?php
									   }
			?>
		</tr>
		<?php
			}
		?>
		
		<tr>
			<td colspan="4" style="text-align: right;"><a href="home.php">Go Home</a></td>
		</tr>
	</table>
</body>
</html>