<?php include "connection.php" ?>
<?php
	$error_msg = array();
	$success = "";
	if($_POST){
		if(empty($_POST["id"])){
			$error_msg['id']="*id can not be empty";
			echo('bug');
		}
		if(empty($_POST['Bill'])){
			$error_msg['Bill']="*Bill field can not be empty";
			echo('bug');
		}
		if(isset($_POST['Bill'])){
			if($_POST['Bill']<0){
			$error_msg['Bill']="*Bill field can not be empty";
			echo('bug');
			}
		}
		
		if(count($error_msg)==0){
			$id = $_POST['id'];
			$Bill =$_POST['Bill'];
			$sql = "insert into paymentrecords(id,Bill) values ('$id','$Bill');";
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

<body style="background: #EBEBEB">
	<form action="" method="post">
		<fieldset style="padding: 10px; width: 300px;">
			<legend>ADD BILL FOR ALL USERS</legend>
			Id<br>
			<input type="number" value="<?php if(isset($_POST['id'])){ echo($_POST['id']);}?>" name="id"><br><p style="font-weight: bold; color: red;"><?php if( isset($error_msg['id']) ){ echo($error_msg['id']);} ?> </p><br>
			
			Bill<br>
			<input type="number" value="<?php if(isset($_POST['Bill'])){ echo($_POST['Bill']);}?>" name="Bill"><p style="font-weight: bold; color: red;"><?php if( isset($error_msg['Bill']) ){ echo($error_msg['Bill']);} ?> </p><br>
			
			
			<input type="submit" name="submit" value="Add Bill">
			<a href='PaymentDetails.php'>All Payments</a>
			<a href='edit_paymentdetails.php'>Edit Payment Details</a>
		</fieldset>
	</form>
	<p style="color: red"><?php echo($success)?></p>
</body>
</html>