
<?php /*
Template Name: Contact
*/ ?>


<head>
<link rel="stylesheet" href="./form_registration/css/style.css">
<meta charset="UTF-8">
	
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="inputscript.js"></script>
</head>






<script>
    jQuery(document).ready(function($) {
        $("#contact").submit(function() {
            var str = $(this).serialize();
            $.ajax({
                type: "POST",
                // url: "<?php //bloginfo('template_url'); ?>/mail.php", // здесь указываем путь ко второму файлу
                url: "mail.php",
                data: str,
                success: function(msg) {
                    if(msg == 'OK') {                        
                        //result = '<div class="ok">Сообщение отправлено</div>'; // текст, если сообщение отправлено                        
                        // $("#fields").show();
                        
                    }
                    else {result = msg;
                        result = '<div class="ok">Вы успешно записались на прием!</div>';
                        $("#fields").show();
                        setTimeout(function() {window.location.reload();}, 2000);
                    }
                    $('#note').html(result);
                     $('.input', '#contact') // очищаем поля после того, как сообщение отправилось
     .not(':button, :submit, :reset, :hidden')
     .val('')			 
                }
            });
            return false;
        });
    });
</script>









<body>

<?php           
            $servername = "localhost";
            $username = "qwee";
            $password = "1337228";
            $dbname = "test";
            $conn = mysqli_connect($servername, $username, $password, $dbname);?>



<!-- <form id="contact" action="<?php //bloginfo('template_url'); ?>mail.php" method="post">  -->
        <form id="contact" action="mail.php" method="post">
        <div id="note"></div> 
        <div id="fields"> 
            <h2 class="header-sign">Запись в салон</h2>
            <p><input type="text" name="name" class="input" placeholder="Имя" required></p>
            <p><input type="text" name="surname" class="input" placeholder="Фамилия" required></p>
            <p><input type="email" name="email" class="input" placeholder="E-mail" required></p>
            <p><input type="text" name="phone" class="input" placeholder="Телефон" required></p>
            
            

            <div class="row">
                <select name="choose_service" id="type" class="select-main" >
                    <option value="0">Выберите услугу</option>
                <?php
                    $query1 = mysqli_query($conn, "SELECT * FROM services");
                    while($row = mysqli_fetch_assoc($query1)){
                    ?>
                    <option value="<?=$row['id']?>"><?=$row['service_name']?></option>
                    <?php
                }
                ?>
                </select>
            </div>
            
            <div class="row">
                <select name="choose_master" id="kind" class="select-main" disabled>
                    <option value="0">Выберите из списка</option>
                </select>
            </div>

            <div class="row">
                <select name="choose_date" id="category" class="select-main" disabled>
                    <option value="0">Выберите из списка</option >
                </select>
            </div>


            
            <p><input id="submitinput" class="submit" value="Отправить" type="submit" /></p>     
        </div>    
    </form>


    <form id="contact2" action="adminver.php" method="post">
        <p><input id="submitinput2" class="submit" value="админская панель" type="submit" /></p> 
    </form>
</body>

