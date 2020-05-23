<?php
require_once('fun.php');


$servername = "localhost";
$username = "qwee";
$password = "1337228";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname);

$query1 = mysqli_query($conn, "SELECT `master_name` FROM masters WHERE `id`= 1 ");
$query2 = mysqli_query($conn, "SELECT `master_name` FROM masters WHERE `id`= 2 ");
$query3 = mysqli_query($conn, "SELECT `master_name` FROM masters WHERE `id`= 3 ");
$query4 = mysqli_query($conn, "SELECT `master_name` FROM masters WHERE `id`= 4 ");
$query5 = mysqli_query($conn, "SELECT `master_name` FROM masters WHERE `id`= 5 ");
$query6 = mysqli_query($conn, "SELECT `master_name` FROM masters WHERE `id`= 6 ");
$query7 = mysqli_query($conn, "SELECT `master_name` FROM masters WHERE `id`= 7 ");

$firstmaster = mysqli_fetch_row($query1);
$secondmaster = mysqli_fetch_row($query2);
$thirdmaster = mysqli_fetch_row($query3);
$fourmaster = mysqli_fetch_row($query4);
$fivemaster = mysqli_fetch_row($query5);
$sixmaster = mysqli_fetch_row($query6);
$sevenmaster = mysqli_fetch_row($query7);





$types = array(
	1 => array(
		
		1 => $firstmaster,
		2 => $secondmaster
	
	),
	2 => array(

		1 => $firstmaster,
		2 => $secondmaster
	),
	3 => array(
	
		1 => $firstmaster,
		2 => $secondmaster
    ),


    4 => array(
	
		1 => $thirdmaster,
		2 => $fourmaster
	
    ),

    5 => array(
	
		1 => $thirdmaster,
		2 => $fourmaster
    ),

    6 => array(
	
		1 => $fivemaster,
		2 => $sixmaster
		
    ),

    7 => array(
		
		1 => $sevenmaster
		
    ),
);
$kinds = array(

	1 => array(        
		1 => getShedules(1),		
		2 =>  getShedules(2),
	),

	2 => array(		
		1 =>  getShedules(1),
		2 =>  getShedules(2),		
	),

	3 => array(
		1 =>  getShedules(1),
		2 =>  getShedules(2),		
    ),


    4 => array(
        1 => getShedules(3),
        2 => getShedules(4),
    ),

    5 => array(
        1 => getShedules(3),
        2 => getShedules(4),
    ),

    6 => array(
        1 => getShedules(5),
        2 => getShedules(6),
    ),

    7 => array(
        1 => getShedules(7),        
    )
);

// Проверяем наличие переменной, которая укажет данному сценарию какие именно данные нужны
if (!isset($_POST['query']) || !$_POST['query']) {
	exit("Нет данных определяющих тип запроса");
}
else {
	// Сохраняем строку запроса данных в отдельной переменной
	$query = trim($_POST['query']); // Очищаем от лишних пробелов
	
	// Определяем тип запроса
	switch($query) {
	case 'getKinds':	// Запрос на получение видов транспорта
		// Сохраним в переменную значение выбранного типа транспорта
		$type_id = trim($_POST['type_id']); // Очистим его от лишних пробелов
		// Формируем массив с ответом
		$result = NULL;
		$i = 0;
		foreach ($types[$type_id] as $kind_id => $kind) {
			$result[$i]['kind_id'] = $kind_id;
			$result[$i]['kind'] = $kind;
			$i++;
		}
	break;
	case 'getCategories':	// Запрос на получение категорий транспорта
		// Сохраним в переменные значения выбранных типа транспорта и вида транспорта
		$type_id = trim($_POST['type_id']); // Очистим их от лишних пробелов
		$kind_id = trim($_POST['kind_id']);
		// Формируем массив с ответом
		$result = NULL;
		$i = 0;
		foreach ($kinds[$type_id][$kind_id] as $category_id => $category) {
			$result[$i]['category_id'] = $category_id;
			$result[$i]['category'] = $category;
			$i++;
		}
	break;
	default:
		// Если данные не определены
		$result = NULL;
	break;
	}
}

// Преобразуем данные в формат json, чтобы их смог обработать JavaScript-сценарий, приславший запрос
echo json_encode($result);

?>