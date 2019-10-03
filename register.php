<?php include "connection.php" ?>
<?php
	$error_msg = array();
	$success = "";
	if($_POST){
		if(empty($_POST["id"])){
			$error_msg['id']="*id can not be empty";
			echo('bug');
		}
		if(empty($_POST['password'])){
			$error_msg['password']="*password field can not be empty";
			echo('bug');
		}
		if(empty($_POST['conpassword'])){
			$error_msg['conpassword']="*confirm password field can not be empty";
			echo('bug');
		}
		if(empty($_POST['name'])){
			$error_msg['name']="*name field can not be empty";
			echo('bug');
		}
		if(empty($_POST['email'])){
			$error_msg['email']="*email field can not be empty";
			echo('bug');
		}
		if(isset($_POST['password']) && isset($_POST['conpassword']) ){
			if($_POST['password'] != $_POST['conpassword']){
				$error_msg['conpassword']="*Both Field must be same";
				$error_msg['password']="*Both Field must be same";
			}
		}
		if(count($error_msg)==0){
			if($_POST['u_type']=='user'){
				$utype = 0;
			} else {
				$utype = 1;
			}
			$user_id = $_POST['id'];
			$name = $_POST['name'];
			$password = $_POST['password'];
			$email =$_POST['email'];
			$sql = "insert into users(user_id,password,name,email,is_admin) values ('$user_id','$password','$name','$email','$utype');";
			echo($utype);
			$result = mysqli_query($con,$sql);
			if($result){
				
				header("Location: successfullyreg.php");
				
			} else {
				echo(mysqli_error_msg($con));
			}
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<h1 align="center">Meal Management System...</h1>
</head>

<body style="background: #EBEBEB">
	<form action="register.php" method="post">
		<div align="center"><fieldset style="padding: 10px; width: 300px;">
			<legend>REGISTRATION</legend>
			Id(User_Name)<br>
			<input type="text" value="<?php if(isset($_POST['id'])){ echo($_POST['id']);}?>" name="id"><br><p style="font-weight: bold; color: red;"><?php if( isset($error_msg['id']) ){ echo($error_msg['id']);} ?> </p><br>
			Password<br>
			<input type="password" name="password"><p style="font-weight: bold; color: red;"><?php if( isset($error_msg['password']) ){ echo($error_msg['password']);} ?> </p><br>
			Confirm Password<br>
			<input type="password" name="conpassword"><p style="font-weight: bold; color: red;"><?php if( isset($error_msg['conpassword']) ){ echo($error_msg['conpassword']);} ?> </p>
			Name<br>
			<input type="text" value="<?php if(isset($_POST['name'])){ echo($_POST['name']);}?>" name="name"><p style="font-weight: bold; color: red;"><?php if( isset($error_msg['name']) ){ echo($error_msg['name']);} ?> </p><br>
			Email<br>
			<input type="email" value="<?php if(isset($_POST['email'])){ echo($_POST['email']);}?>" name="email"><p style="font-weight: bold; color: red;"><?php if( isset($error_msg['email']) ){ echo($error_msg['email']);} ?> </p><br>
			User Type[User/Admin]<br>
			<select name="u_type">
				<option value="user" selected>User</option>
				<option value="admin" >Admin</option>
			</select>
			<hr>
			<input type="submit" name="submit" value="Register">
			<a href="index.php">Login</a>
		</fieldset></div>
	</form>
	<p style="color: red"><?php echo($success)?></p>
</body>
</html>