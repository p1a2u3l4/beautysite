<?php
/**
 *  Функция для получения расписаний
 */
function getShedules($id) {
	
	// Подключаемся к СУБД MySQL
	
	$servername = "localhost";
    $username = "qwee";
    $password = "1337228";
    $dbname = "test";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
	
	// Выполняем запрос
	$query = mysqli_query( $conn, "SELECT * FROM `WorkShedules` WHERE `master_id` = '" . $id . "' AND `ordered` = 0" );
	
	// Поместим данные, которые будет возвращать функция, в массив
	// Пока что он будет пустым
	$array = array();

	
	while ( $row = mysqli_fetch_assoc( $query ) ) {
		
		array_push($array, $row[ 'datetime' ]);		
	}
	
	// Возвращаем вызову функции массив с данными
	 return $array;	
}




function retranslate($num) {
	$servername = "localhost";
    $username = "qwee";
    $password = "1337228";
    $dbname = "test";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
	$quer = mysqli_query($conn, "SELECT `datetime` from `WorkShedules` WHERE `id` = '".$num."'"); //все записи этого мастера		
	$search_date = mysqli_fetch_row($quer);
	return $search_date;
}



function search_master($servid, $masterid) {
	$servername = "localhost";
    $username = "qwee";
    $password = "1337228";
    $dbname = "test";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if ($servid == "1" || $servid == "2" || $servid == "3") {
	$quer = mysqli_query($conn, "SELECT `master_name` from `masters` WHERE `id` = '".$masterid."'"); //все записи этого мастера		
	$search_date = mysqli_fetch_row($quer);
	}

	if ($servid == "4" || $servid == "5") {
		$masterid = $masterid + 2;
		$quer = mysqli_query($conn, "SELECT `master_name` from `masters` WHERE `id` = '".$masterid."'"); //все записи этого мастера		
		$search_date = mysqli_fetch_row($quer);
	}

	if ($servid == "6") {
		$masterid = $masterid + 4;
		$quer = mysqli_query($conn, "SELECT `master_name` from `masters` WHERE `id` = '".$masterid."'"); //все записи этого мастера		
		$search_date = mysqli_fetch_row($quer);
	}

	if ($servid == "7") { 
		$masterid = 7;
		$quer = mysqli_query($conn, "SELECT `master_name` from `masters` WHERE `id` = '".$masterid."'"); //все записи этого мастера		
		$search_date = mysqli_fetch_row($quer);
	}


	return $search_date[0];
}


function search_service($servid) {
	$servername = "localhost";
    $username = "qwee";
    $password = "1337228";
    $dbname = "test";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
	$quer = mysqli_query($conn, "SELECT `service_name` from `Services` WHERE `id` = '".$servid."'"); //все записи этого мастера		
	$search_date = mysqli_fetch_row($quer);
	return $search_date[0];
}





function masters_per_service($servid, $master) {
	$servername = "localhost";
    $username = "qwee";
    $password = "1337228";
    $dbname = "test";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if ($servid == "1" OR $servid == "2" OR $servid == "3") {
		$master = intval($master);
	}

	if ($servid == "4" OR $servid == "5" ) {
		$master = intval($master) + 2;
	}

	if ($servid == "6") {
		$master = intval($master) + 4;
	}

	if ($servid == "7") {
		$master = 7;
		$master = intval($master);
	}

	return $master;
}
?>