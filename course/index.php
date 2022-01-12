<?php
    $title = "Главная";
    require "blocks/header.php";
    ?>
        
    <div class = "authorization">
        <p>Авторизация</p>
    </div>
    
    <div class = "text-center container-fluid">
    <h1>Поиск спортивных залов в вашем районе</h1>
    <form action="gyms.php" method = "POST">
    <input type="text" name = "username" placeholder = "Введите ваш район" class = "form-control w-50 p-3 container-fluid text-center mt-3"><br>
    <input type="submit" value = "Отправить" class = "btn btn-success">
    </form>
    </div>


<?php
    require "blocks/footer.php";
    ?>