
<?php
require("connectdb.php");
require "blocks/header.php";

$name = $_POST['name'];
$login = $_POST['login'];
$pass = $_POST['password'];

if (!empty($_POST)){
    if(trim($name) == ""){
        echo '<script type="text/javascript">alert(" Вы не ввели имя пользователя!")</script>';
    }
    else if(strlen(trim($name)) <= 1)
        echo '<script type="text/javascript">alert("Такого имени не существует")</script>';
    
    else if(trim($login) == "")
        echo '<script type="text/javascript">alert("Введите логин!")</script>';
    
    else if(strlen(trim($login)) <= 2)
        echo '<script type="text/javascript">alert("Логин должен быть больше 2-х символов")</script>';
    
    else if(trim($pass) == "")
        echo '<script type="text/javascript">alert("Вы не ввели пароль!")</script>';
    
    else if(strlen(trim($pass)) <= 2)
        echo '<script type="text/javascript">alert("Пароль должен быть больше 2-х символов")</script>';

    else{
    $result = mysqli_query($connect, "SELECT * FROM users WHERE login=\"".$_POST['login']."\"");
    //echo mysqli_num_rows($result);
    if(mysqli_num_rows($result) == 0){
        mysqli_query($connect, "INSERT INTO users (name, login, password) VALUES (
            \"".$_POST["name"]."\", 
            \"".$_POST["login"]."\",
            \"".md5($_POST["password"])."\"
            )"
        );
    }
    //$id = mysqli_insert_id($connect);
    header("Location: index.php"); // тут у тебя должен быть индекс
}
}

$title = "Регистрация";
$content = "
<h1 class = 'text-center mt-5'>Регистрация</h1>
<div class = 'w-25 text-left container mt-3 '>

<form  method=\"POST\">
    <div class = 'row'>
        <label>ФИО</label>
        <input class = 'justify-content-end' type=\"text\" name=\"name\">
    </div>
    
    <div class = 'row'>
        <label>Логин</label>
        <input class = 'justify-content-end' onkeyup='checkParams()' type=\"text\" name=\"login\">
    </div>
    
    <div class = 'row'>
        <label>Пароль</label>
        <input  class = 'justify-content-end' type=\"password\" name=\"password\">
    </div>
    <div class = 'mt-3 text-center'>
        <button  type=\"submit\">Регистрация</button>
    </div>
</form>
</div>
";

require  "blocks/footer.php";
?>
