<?php
    session_start();
    $title = "Форма обратной связи";
    require_once "blocks/header.php";

    ?>
    <h1 class = "my-5 text-center"><?=$title?></h1>


    <div class="text-success"><?=$_SESSION['success_mail']?></div>


    <form class = "w-25 text-center container-fluid" action="form_check.php" method="post">
        <input type="text" name = "username" value = "<?=$_SESSION['username']?>" placeholder = "Введите имя" class = "form-control">
        <div class = "text-danger"><?=$_SESSION['error_username']?></div><br>
        <input type="email" name = "email" value = "<?=$_SESSION['email']?>" placeholder = "Введите email" class = "form-control">
        <div class = "text-danger"><?=$_SESSION['error_email']?></div><br>
        <input type="text" name = "subject" value = "<?=$_SESSION['subject']?>" placeholder = "Тема сообщения" class = "form-control">
        <div class = "text-danger"><?=$_SESSION['error_subject']?></div><br>
        <textarea name="message"  placeholder = "Ваше сообщение" class = "form-control"><?=$_SESSION['message']?></textarea>
        <div class = "text-danger"><?=$_SESSION['error_massage']?></div><br>
        <button type = "submit" class = "btn btn-success">Отправить</button>

    </form>

    <?php
     require "blocks/footer.php";

    ?>