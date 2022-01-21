<?php
require("connectdb.php");
session_start();


unset($_SESSION['username']);
unset($_SESSION['email']);
unset($_SESSION['subject']);
unset($_SESSION['message']);

unset($_SESSION['error_username']);
unset($_SESSION['error_email']);
unset($_SESSION['error_subject']);
unset($_SESSION['error_massage']);



function redirect(){
    header('Location: form.php');
    exit;
}


$user_name = htmlspecialchars(trim($_POST['username']));
$from = htmlspecialchars(trim($_POST['email']));
$subject = htmlspecialchars(trim($_POST['subject']));
$message = htmlspecialchars(trim($_POST['message']));

$_SESSION['username'] = $user_name;
$_SESSION['email'] = $from;
$_SESSION['subject'] = $subject;
$_SESSION['message'] = $message;

if(strlen($user_name) <= 1){
    $_SESSION['error_username'] = "Введите коректное имя";
    redirect();
}
else if(strlen($from) <= 5 || strpos($from, "@") == false){
    $_SESSION['error_email'] = "Вы ввели некоректный Email";
    redirect();
}
else if (strlen($subject) <= 2){
    $_SESSION['error_subject'] = "Тема сообщения не менее 2 символов";
    redirect();
}
else if (strlen($message) <= 10){
    $_SESSION['error_massage'] = "Текст должен быть больше 10 символов";
    redirect();
}
else {
    $subject = "=?utf-8?B".base64_encode($subject)."?=";
    $headers = "From:\r\nReply-to: $form\r\nContent-type:text/plain; charset=utf-8\r\n";
    mail("silchenko.a.e@mail.ru", $subject, $message, $headers );
    $_SESSION['success_mail'] = "Вы успешно отправили письмо!";

    //$result = mysqli_query($connect, "SELECT * FROM form WHERE username=\"".$_POST['username']."\"");
    //echo mysqli_num_rows($result);
    //if(mysqli_num_rows($result) == 0){
        mysqli_query($connect, "INSERT INTO form (username, email, subject, message) VALUES (
            \"".$_POST["username"]."\", 
            \"".$_POST["email"]."\",
            \"".$_POST["subject"]."\",
            \"".$_POST["message"]."\"
            )"
        );
    //}
    
   redirect();
}