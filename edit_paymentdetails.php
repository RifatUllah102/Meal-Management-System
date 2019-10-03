<?php
	include("connection.php");
	session_start();
	if(!isset($_SESSION['assoc'])){
		header("Location: index.php");
	}
	$all_infos = $_SESSION['assoc'];
	$error = "";
	$num=0;
    if($_POST){
		$id = $_POST['id'];
		$amount = $_POST['Bill'];
		if(empty($_POST['id'])||empty($_POST['Bill'])){
			$error ="This form can not be empty";
		} else {
			$sql1 = "select distinct id from paymentrecords;";
			$result1=mysqli_query($con,$sql1);
			$num=mysqli_num_rows($result1);
			if($num>0){
				$sql2 ="update paymentrecords set Bill='$amount' where id='$id';";
				$result2=mysqli_query($con,$sql2);
				mysqli_error($con);
				header("Location: successfull.php");
			} else {
				$error="<p style='color:red'>USer Dont Exists in the DataBase.</p>";
			}
			
		}
	}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Edit form</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body style="background: #EBEBEB">
        
          <div class="display">
            <form action="edit_paymentdetails.php" method="post" name="insertform">
                <p>
                    <label for="id"  id="preinput"> ID : </label>
                    <input type="number" name="id" placeholder="Enter the Id" value="" id="inputid" />
                </p>
                <p>
                    <label  for="Bill"  id="preinput"> Bill : </label>
                    <input type="number" name="Bill" placeholder="Enter The Update" value="" id="inputid" />
                </p>
                <p>
                    <input type="submit" name="update" value="Update" id="inputid" />
                </p>
            </form>
            <?php if($error==""){echo($error);} ?>
            <p align="center"><a href="home.php">Go Home</a></p>
          </div>
        
    </body>
</html>