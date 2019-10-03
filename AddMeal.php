<?php 
	include ("connection.php");
	session_start();
	if(!isset($_SESSION['assoc'])){
		header("Location: index.php");
	}
	$all_infos = $_SESSION['assoc'];
?>
<?php
	$error_msg = array();
	$success = "";
	if($_POST){
		if(empty($_POST["id"])){
			$error_msg['id']="*id can not be empty";
			echo('Error in ID');
		}
		if(empty($_POST['Meal'])){
			$error_msg['Meal']="*Meal field can not be empty";
			echo('Error in Meal');
		}
		/*if(empty($_POST['Date'])){
			$error_msg['Date']="*Date field can not be empty";
			echo('Error in date');
		}*/
		
		if(count($error_msg)==0){
			
			$id = $_POST['id'];
			$meal = $_POST['Meal'];
			$date =$_POST['Date'];
			$sql = "insert into mealrecords(id,Meal) values ('$id','$meal');";
			$result = mysqli_query($con,$sql);
			if($result){
				
				header("Location: successfull.php");
				
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
</head>

<body>
	<form style="background: #EBEBEB" action="" method="post">
		<fieldset style="padding: 10px; width: 300px;">
			<legend>ADD MEAL FOR ALL USERS</legend>
			Id<br>
			<input type="Int" value="<?php if(isset($_POST['id'])){ echo($_POST['id']);}?>" name="id"><br><p style="font-weight: bold; color: red;"><?php if( isset($error_msg['id']) ){ echo($error_msg['id']);} ?> </p><br>
			
			Meal<br>
			<input type="Int" value="<?php if(isset($_POST['Meal'])){ echo($_POST['Meal']);}?>" name="Meal"><p style="font-weight: bold; color: red;"><?php if( isset($error_msg['Meal']) ){ echo($error_msg['Meal']);} ?> </p><br>
			

			<input type="submit" name="submit" value="Add Meal">
			<a href='View_Meal_details.php'>Meal Records</a>
			<a href='Mealedit.php'>Edit Meal Records</a>
			<a href="home.php">Go Home</a>
		</fieldset>
	</form>
	<p style="color: red"><?php echo($success)?></p>
</body>
</html>