<?php
	include("connection.php");
	session_start();
	if(!isset($_SESSION['assoc'])){
		header("Location: index.php");
	}
	$all_infos = $_SESSION['assoc'];
?>
<html>
<head>
<meta charset="utf-8">
<style>
	table,tr,td {
		border:  1px solid black; 
		border-collapse: collapse;
	}
</style>
</head>

<body style="background: #EBEBEB">
<?php
	$sql = "SELECT sum(Meal) as sum FROM mealrecords where id = '".$all_infos['id']."';";
	if($result = mysqli_query($con, $sql)){
   	 	if(mysqli_num_rows($result) > 0){?>
			 <TABLE>
             <tr>
             <td colspan="2"><h2>Your Meal Information.</td>
             </tr>
             <?php
        		while($row = mysqli_fetch_array($result))
                 { ?>          
                      <tr>
                      <td>Your Total Meal</td>
		             <td><?php echo $row['sum'] ; ?></td>
		             </tr>
		   <?php
				 } ?>
	       </TABLE>
	       <?php
	      mysqli_free_result($result);
			
   	     }
	     else{    
			 echo("You don't Have any Meal."); 
		 }
	}
	else{
	 echo ("ERROR: Could not able to execute $sql. " . mysqli_error($con)) ;
	}
	 mysqli_close($con);
		?>
	
</body>
</html>

