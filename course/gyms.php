<?php
$title = "Результат поиска";
    session_start();
    require "blocks/header.php";
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    require "connectdb.php";

    function redirect(){
        header('Location: index.php');
        exit;
    }

    $search = $_POST['district'];
    $query = mysqli_query($connect, "SELECT distinct ObjectName, Address, Email, WebSite, HelpPhone FROM `gyms` WHERE `AdmArea` LIKE '%$search%' OR `District` LIKE '%$search%' ");
    
    if(empty($_POST['district'])){
    $_SESSION['error_search'] = "Введите ваш район!";
    redirect();
        }
        
    elseif (!$query || mysqli_num_rows($query) == 0){
    $_SESSION['error_search'] = "Данные по этому району не найдены";
    redirect(); 
    }
    
    else{
    unset ($_SESSION['error_search']);
    $content = '<h3 class = "mt-3">Результаты поиска по району '.$_POST["district"].':</h3>';
    $content .= "<table style = 'background-color:#f7f7f7'  class='table table-hover mt-3 table-bordered'><tr style = 'background-color:#8a9191'><th>Название</th><th>Адрес</th><th>Email</th><th>WebSite</th><th>Телефон</th></tr>";
    while($row = mysqli_fetch_assoc($query)){
    $content .= '
    <tr>
    <td>'.$row['ObjectName'].'</td>
    <td> '.$row['Address'].'</td>
    <td> '.$row['Email'].'</td>
    <td><a href = "//'.$row['WebSite'].'">'.$row['WebSite'].'</td>
    <td> '.$row['HelpPhone'].'</td>
    </tr>
    ';
    }   
} 
    $content .= "</table>";
    
    
?> 
<div class = "container-fluid">
    <?=$content?>
    </div>

<footer class="footer">
</body>
</html>