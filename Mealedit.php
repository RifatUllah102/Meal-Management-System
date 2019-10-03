<?php
    include("connection.php");
	session_start();
	if(!isset($_SESSION['assoc'])){
		header("Location: index.php");
	}
	$all_infos = $_SESSION['assoc'];

    if($_POST){
		$id = $_POST['id'];
		$meal = $_POST['Meal'];
		if(empty($_POST['id'])||empty($_POST['Meal'])){
			$error ="This form can not be empty";
		} else {
			$sql1 = "select distinct id from paymentrecords;";
			$result1=mysqli_query($con,$sql1);
			$num=mysqli_num_rows($result1);
			if($num>0){
				$sql2 ="update  Mealrecords set Meal='$meal' where id='$id';";
				$result2=mysqli_query($con,$sql2);
				mysqli_error($con);
				header("Location: successfull.php");
			} else {
				$error="<p style='color:red'>User Don't Exists in the DataBase.</p>";
			}
			
		}
	}
?>

<!DOCTYPE>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Edit form</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body style="background: #EBEBEB">
          <div class="display">
            <form action="" method="post" name="insertform">
                <p>
                    <label for="id"  id="preinput"> ID : </label>
                    <input type="Int" name="id" placeholder="Enter the Id" value="" id="inputid" />
                </p>
                <p>
                    <label  for="Meal"  id="preinput"> Meal : </label>
                    <input type="Int" name="Meal" placeholder="Enter The Meal Number" value="" id="inputid" />
                </p>
                <p>
                    <input type="submit" name="update" value="Update" id="inputid" />
                </p>
            </form>
             <p align="center"><a href="home.php">Go Home</a></p>
          </div>
        
    </body>
</html>