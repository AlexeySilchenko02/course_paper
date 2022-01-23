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
            <input type="text" id="district" name = "district" placeholder = "Введите ваш район" class = "form-control w-50 p-3 container-fluid text-center mt-4"><br>
            <div class = "text-danger"><?=$_SESSION['error_search']?></div><br>
            <input type="submit" value = "Отправить" class = "btn btn-success">
            </form>
    </div>
    <?php else:?>
        <div class = "text-center container-fluid">
        <h1>Поиск спортивных залов в вашем районе</h1>
        <input type="text" id="district" name = "district" placeholder = "Введите ваш район" class = "form-control w-50 p-3 container-fluid text-center mt-3"><br>
        <p class = " text-danger container-fluid text-center">Чтобы воспользоваться поиском, авторизуйтесь!</p>
        </div>
    <?php endif;?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 text-center">
                <i class="fa fa-code" aria-hidden="true"></i>
                <img class="img-fluid" src="photo/gyms.jpg" alt="">
                
            </div>
            <div class="col-md-4 text-center">
                <i class="fa fa-html5" aria-hidden="true"></i>
                <h4 class="pb-3">20 лучших фитнес клубов Москвы</h4>
                <h5 class="pb-3"><a href = "top.php">Смотреть!</a></p>
            </div>
            <div class="col-md-4 text-center">
                <i class="fa fa-css3" aria-hidden="true"></i>
                <img class="img-fluid" src="photo/gyms1.jpg" alt="">
            </div>
            <div class="col-md-4 text-center">
                <i class="fa fa-code" aria-hidden="true"></i>
                <img class="img-fluid" src="photo/g2.jpg" alt="">
                
            </div>
            <div class="col-md-4 text-center">
                <i class="fa fa-code" aria-hidden="true"></i>
                <img class="img-fluid mt-2" src="photo/g3.jpg" alt="">
                
            </div>
            <div class="col-md-4 text-center">
                <i class="fa fa-code" aria-hidden="true"></i>
                <img class="img-fluid" src="photo/g4.jpg" alt="">
                
            </div>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="copyright text-center border-top">
        <p>Все права защищены &copy; 2022</p>
        <p><?php echo date('d.m.Y H:i:s') . '<br>';?></p>
        </div>
</footer>
</body>
</html>