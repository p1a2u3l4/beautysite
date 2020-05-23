
<?php

$post = (!empty($_POST)) ? true : false;
if($post) {

	require_once("fun.php");
    $servername = "localhost";
		$username = "qwee";
		$password = "1337228";
		$dbname = "test";
	$conn = mysqli_connect($servername, $username, $password, $dbname);


	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$master = $_POST['choose_master'];
    $service = $_POST['choose_service'];
    $event_date = $_POST['choose_date'];

    
	
	


	

	$sub = $_POST['name'];
	// $message = $_POST['message'];
	$error = '';
	if(!$name) {$error .= 'Укажите свое имя. ';}
	if(!$email) {$error .= 'Укажите электронную почту. ';}
	// if(!$sub) {$error .= 'Укажите тему обращения. ';}
	// if(!$message || strlen($message) < 1) {$error .= 'Введите сообщение. ';}
	if(!$error) {
		//$address = "psilev97@mail.ru"; // ВНИМАНИЕ! Здесь указываем адрес электронной почты, на которую будут приходить письма
		// $mes = "Имя: ".$name."\n\nТема: " .$sub."\n\nСообщение: ".$message."\n\n";
		// $mes = "Имя: ".$name;
		//$mes= "test";
		//$send = mail($address,$sub,$mes,"Content-type:text/plain; charset = UTF-8\r\nFrom:$email");

		




		

		
		
		// Check connection
		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}

		


		// if ($service == "1" OR $service == "2" OR $service == "3") {
		// 	$master = intval($master);
		// }

		// if ($service == "4" OR $service == "5" ) {
		// 	$master = intval($master) + 2;
		// }

		// if ($service == "6") {
		// 	$master = intval($master) + 4;
		// }

		// if ($service == "7") {
		// 	$master = 7;
		// 	$master = intval($master);
		// }

		$master = masters_per_service($service, $master);
        
		$quer1 = mysqli_query($conn, "SELECT `id`,`datetime` from `WorkShedules` WHERE `master_id` = '".$master."' AND `ordered` = 0");
		$event_date = mysqli_fetch_array($quer1);
		
		 
		 
		 $sql = "INSERT INTO beautytable (firstname, surname, email, phone, event_date, master_id, service_id)
		 VALUES ('".$name."', '".$surname."', '".$email."', '".$phone."', '".$event_date[1]."', '".$master."', '".$service."')";
        mysqli_query($conn, "UPDATE `WorkShedules` SET `ordered`=1 WHERE `id`= '".$event_date[0]."'");
        echo 'OK'; 
		if (mysqli_query($conn, $sql)) {
			//echo 'OK';
		} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);








		if($send) {

			//echo 'OK';
			
			
	}
	else {echo '<div class="err">'.$error.'</div>';}
}

}
?>