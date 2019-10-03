<?php
	include("connection.php");
	session_start();
	if(!isset($_SESSION['assoc'])){
		header("Location: index.php");
	}
	$all_infos = $_SESSION['assoc'];
?>

<?php
$sql = "SELECT SUM(Bazar) AS value_sum FROM bazarecords";
$result = mysqli_query($con,$sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        
		$bazar=$row["value_sum"];
    }
} else {
    echo "No Result Found.";
}

$sql = "SELECT SUM(Meal) AS value_sum1 FROM mealrecords";
$result = mysqli_query($con,$sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
        
		$meal=$row["value_sum1"];
    }
} else {
    echo "No Result Found.";
}

$mealrate=$bazar/$meal;


$sql = "SELECT SUM(Bill) AS value_sum  FROM paymentrecords where id = '".$all_infos['id']."';";
$result = mysqli_query($con,$sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        //echo "Total Payment : " . $row["value_sum"];
		echo "<br>";
		$deposit=$row["value_sum"];
    }
} else {
    echo "No Result Found.";
}

$sql = "SELECT SUM(Meal) AS value_sum1  FROM mealrecords where id = '".$all_infos['id']."';";
$result = mysqli_query($con,$sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "Total Meal : " . $row["value_sum1"];
		echo "<br>";
		echo "Meal Rate :".$mealrate;
		echo "<br>";
		$Meal=$row["value_sum1"];
    }
} else {
    echo "No Result Found.";
}
$Cost=$mealrate*$Meal;
$curntBlans=$deposit-$Cost;
echo "Total Cost:".$Cost;
echo "<br>";
echo "Curent Blance:".$curntBlans;

?>

<p><a href="home.php">Go Home</a></p>

