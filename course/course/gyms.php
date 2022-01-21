<?php
    require "blocks/header.php";
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    require "connectdb.php";
    //$connect = mysqli_connect("std-mysql.ist.mospolytech.ru", "std_1560_kr_test", "Silchenko2002", "std_1560_kr_test");
    

    if(empty($_POST['district']))
        echo "Строка пуста!";
    else{
    $search = $_POST['district'];
    $query = mysqli_query($connect, "SELECT * FROM `pages` WHERE `title` LIKE '%$search%' OR `content` LIKE '%$search%'" );
    while($row = mysqli_fetch_assoc($query)) echo "<h1>".$row['title']."</h1><p>".$row['content']."</p><br>";
    }

    require "blocks/footer.php";
?> 