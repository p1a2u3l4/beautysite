
<?php /*
Template Name: adminview
*/ ?>


<head>
<link rel="stylesheet" href="./form_registration/css/style.css">
<meta charset="UTF-8">
</head>




<?php 

$servername = "localhost";
$username = "qwee";
$password = "1337228";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname);

?>

<body>
    
        <div id="note"></div> 
        <div id="fields"> 
        
                            
        <!-- </div>  -->
        <!-- <form action="search_tickets.php?firstname=<?php //echo $name_res; ?>&surname=<?php //echo $sur_res; ?>" value="<?php //echo $_POST['search_name']; ?>"method="post">   -->
        <form action="search_tickets.php"  method="post">
        <h2 class="admin-sign">Меню Администратора</h2>   
        <p><input type="text" name="search_name" class="admin-input" placeholder="Имя" required></p>
        <p><input type="text" name="search_surname" class="admin-input" placeholder="Фамилия" required></p>
            <p><input class="admin-submit" value="Найти запись" type="submit" /></p>

        </form>
        <form action="tickets.php" method="post">  
            <p><input  class="admin-submit" value="Показать все записи" type="submit" /></p>  
        </form>

        <form action="add_time.php" method="post">  <!--форма для настройки времени-->
            <p><input type="datetime-local" name="input_date" class="admin-input" placeholder="Дата и время" required></p>
            <select name="choose_master" id="type" class="select-admin" required>
                            <option value="0">Выберите мастера</option>
                        <?php
                            $query1 = mysqli_query($conn, "SELECT * FROM masters");
                            while($row = mysqli_fetch_assoc($query1)){
                            ?>
                            <option value="<?=$row['id']?>"><?=$row['master_name']?></option>
                            <?php
                        }   ?>
            </select>
        <p><input class="admin-submit" value="Добавить время" type="submit" /></p>
        </form>
        
        </div>
</body>