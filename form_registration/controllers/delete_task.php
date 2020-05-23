<?php 
$servername = "localhost";
$username = "qwee";
$password = "1337228";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$query1 = mysqli_query($conn, "Delete FROM beautytable WHERE id = '".$_GET['id']."'"); 
header("Location: ../../adminver.php");
?>
