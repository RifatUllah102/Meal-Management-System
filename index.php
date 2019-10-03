<?php
	include('connection.php');
	session_start();
	if(isset($_SESSION['user_id'])){
		header("Location:home.php");
	}
	if($_POST){
		$error_msg = array();
		$userid = $_POST['username'];
		$password = $_POST['password'];
		$sql = "select * from users where user_id = '$userid' and password='$password';";
		$result = mysqli_query($con,$sql);
		$num_of_row = mysqli_num_rows($result);
		if( $num_of_row >0){

			if(isset($_POST['rememberme'])){
				setcookie("user_id",$_POST['user_id'],time()+86400);
			}
			$_SESSION['user_id']= $userid;
			header("Location: home.php");
		} else {
			$error_msg['no_user']="true";
		}
	}
?>
<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<h1 align="center">Meal Management System...</h1>
</head>

<body align="center" style="background: #EBEBEB">
	<form method="post" action="<?php echo($_SERVER['PHP_SELF'])?>">
		<div align="center"><fieldset style="padding: 10px; width:150px ">
			<legend>LOGIN</legend>
			User Name <br>
			<input type="text" name="username"> <br>
			Password <br>
			<input type="password" name="password"><br>
			<input type="checkbox" name="rememberMe"> Remember Me<br><hr>
			<input type="submit" value="Login"><a href="register.php"> Register</a>
		</fieldset></div>
	</form>
	<p align="center", style="color: red"><?php if(isset($error_msg['no_user'])){echo("UserName or Password incorrect");}?></p>
</body>
</html>