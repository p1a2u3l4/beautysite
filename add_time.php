<?php 
$servername = "localhost";
$username = "qwee";
$password = "1337228";
$dbname = "test";
$time = $_POST['input_date'];
$master = $_POST['choose_master'];

$master = intval($master);

$new_time = str_replace("T", " ", $time);

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = mysqli_query($conn, "INSERT INTO WorkShedules (`datetime`, `master_id`, `ordered`)
		 VALUES ('".$new_time."', '".$master."', 0)"); 
header("Location: adminver.php"); ?>