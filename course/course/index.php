<?php
    require("session.php");
    $title = "Главная";
    require "blocks/header.php";

    ?>
        
    <div class = "authorization">
            <?php if(isset($session_user) && $session_user != ""):?> 
                    <label>Вы авторизованы как <?=$_SESSION['user']['name']?> </label>
                    <label></label>
                    <a href="logout.php">Выйти</a>
                    <?php else:?>
                <form method="POST" action = "auth.php">
                    <label>Логин</label>
                    <input type="text" name="login" />
                    <label class = "mt-2">Пароль</label>
                    <input type="password" name="password" />
                    <label></label>
                    <button class = "mt-3" type="submit">Войти</button>  <a href="signup.php">Регистрация</a>
                </form>
                <?php endif;?>
    </div>

    <?php if(isset($session_user) && $session_user != ""):?> 
        <div class = "text-center container-fluid">
            <h1>Поиск спортивных залов в вашем районе</h1>
            <form action="gyms.php" method = "POST">
                <input type="text" id="district" name = "district" placeholder = "Введите ваш район" class = "form-control w-50 p-3 container-fluid text-center mt-3"><br>
                <input type="submit" value = "Отправить" class = "btn btn-success">
            </form>
        </div>
    <?php else:?> 
        <h1 class = "container-fluid text-center">Поиск спортивных залов в вашем районе</h1>
        <p class = " text-danger container-fluid text-center">Чтобы воспользоваться поиском, авторизуйтесь!</p>
        <input type="text" name = "district" placeholder = "Введите ваш район" class = "form-control w-50 p-3 container-fluid text-center mt-3"><br>
    <?php endif;?>

<?php

    require "blocks/footer.php";
    ?>