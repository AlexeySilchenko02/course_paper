<?php
    $title = "Форма обратной связи";
    require_once "blocks/header.php";
    require("session.php");

    ?>
    <h1 class = "my-5 text-center"><?=$title?></h1>


    <div class="text-success text-center"><?=$_SESSION['success_mail']?></div>

    <?php if(isset($session_user) && $session_user != ""):?> 
    <form class = "w-50 text-center container-fluid mt-2" action="form_check.php" method="post">
        <input type="text" name = "username" value = "<?=$_SESSION['user']['name']?>" placeholder = "Введите ФИО" class = "form-control">
        <div class = "text-danger"><?=$_SESSION['error_username']?></div><br>
        <input type="email" name = "email" value = "<?=$_SESSION['email']?>" placeholder = "Введите email" class = "form-control">
        <div class = "text-danger"><?=$_SESSION['error_email']?></div><br>
        <input type="text" name = "subject" value = "<?=$_SESSION['subject']?>" placeholder = "Тема сообщения" class = "form-control">
        <div class = "text-danger"><?=$_SESSION['error_subject']?></div><br>
        <textarea name="message"  placeholder = "Ваше сообщение" class = "form-control"><?=$_SESSION['message']?></textarea>
        <div class = "text-danger"><?=$_SESSION['error_massage']?></div><br>
        <button type = "submit" class = "btn btn-success">Отправить</button>
    </form>
    
    <?php else:?>
        <p class = " text-danger container-fluid text-center">Чтобы воспользоваться формой, авторизуйтесь!</p>
        
    <?php endif;?>
    <?php
     require "blocks/footer.php";

    ?>