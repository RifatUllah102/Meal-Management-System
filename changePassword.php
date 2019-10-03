<!DOCTYPE HTML>
<?php
	include("connection.php");
	session_start();

	$error = array();
	$success = array();
	$user_info_array = $_SESSION['assoc'];
	if(!isset($_SESSION['assoc'])){
		header('Location: index.php');
	}

	if($_POST){
		if(empty($_POST['current_password'])){
			$error['current_password'] = "*Current Password Field Can Not Be Empty";
		}
		if(empty($_POST['new_password'])){
			$error['new_password'] = "*New Password Field Can Not Be Empty";
		}
		if(empty($_POST['retype_password'])){
			$error['retype_password'] = "*Retype Password Field Can Not Be Empty";
		}
		if(isset($_POST['new_password']) && isset($_POST['retype_password']) && $_POST['new_password']!=$_POST['retype_password']){
			$error['retype_password'] = "*Retype password and new password doesn't match.";
			$error['new_password'] = "*Retype password and new password doesn't match.";
		}
		if(!empty($_POST['current_password']) &&  $_POST['current_password']!=$user_info_array['password']){
			$error['current_password'] = "*Please enter the correct Password.";
		}
		if(count($error)==0){
			$newPass = $_POST['new_password'];
			$id = $user_info_array['id'];
			$sql = "Update users set password='$newPass' where id ='$id';";
			if(mysqli_query($con,$sql)){
				$success['done'] = "Password Changed Successfully";
				$user_info_array['password'] = $newPass;
				$_SESSION['user_info_array']=$user_info_array;
			} else {
				echo(mysqli_error($con));
			}
		}
	}
?>
<html>
	<head>
		<title>Change Password</title>
	</head>
	<body style="background: #EBEBEB">
		<form style="width: 400px" action="<?php echo($_SERVER['PHP_SELF'])?>" method="post">
			<div align="center"><fieldset style="padding: 10px">
				<legend>CHANGE PASSWORD</legend>
				Current Password<br>
				<input type="password" name="current_password"><br>
				<p style="color: red"><?php if(isset($error['current_password'])){
	echo($error['current_password']);
}?></p><br>
				New Password<br>
				<input type="password" name="new_password"><br>
							<p style="color: red"><?php if(isset($error['new_password'])){
	echo($error['new_password']);
}?></p><br>
				Retype New Password<br>
				<input type="password" name="retype_password"><br>
							<p style="color: red"><?php if(isset($error['retype_password'])){
	echo($error['retype_password']);
}?></p><br>
				<hr>
				<input type="submit" value="Change"><a href="home.php">Home</a>
				
			</fieldset></div>
		</form>
		<p style="color: green"><?php
			if(isset($success['done'])){
				echo($success['done']);
			}
			?></p>
	</body>
</html>