
<?php /*
Template Name: Search_query
*/ ?>



<html>
<head>
<link rel="stylesheet" href="./form_registration/css/style.css">
<meta charset="UTF-8">
</head>

<body>
<?php   
require_once('fun.php');
        $servername = "localhost";
		$username = "qwee";
		$password = "1337228";
		$dbname = "test";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}

        
		

		$query1 = mysqli_query($conn, "SELECT * FROM beautytable WHERE firstname = '".$_POST['search_name']."' AND surname = '".$_POST['search_surname']."'");

        //$myrow = mysqli_fetch_array($query1); ?>

        <div id="fields">
        <?php while($row=mysqli_fetch_array($query1))
            { ?>
            <div class="all-signs">
            <form action="delete_task.php?id=<?php echo $row['id']; ?>" method="post">
              <p class="sign">Номер записи: <?php echo $row['id'] ?></p> 
              <p class="sign">Имя клиента: <?php echo $row['firstname'] ?></p> 
              <p class="sign">Фамилия клиента: <?php echo $row['surname'] ?></p> 
              <p class="sign">Почта клиента: <?php echo $row['email'] ?></p> 
              <p class="sign">Телефон клиента: <?php echo $row['phone'] ?></p>
              <p class="sign">Дата записи: <?php echo $row['event_date'] ?></p>               
              <p class="sign">Сервис: <?php echo search_service($row['service_id']) ?></p>
              <p class="sign">Мастер: <?php echo search_master($row['service_id'], $row['master_id']) ?></p> 
              
                <button class="del-but">Удалить запись</button>
              </form>
            </div>
            <?php }







		mysqli_close($conn); ?>


<form id="contact" action="adminver.php" method="post">
  <button class="del-but">На главную</button>
</form>
</div>
</body>

</html>