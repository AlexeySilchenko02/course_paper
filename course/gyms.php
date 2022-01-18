<?php
    require "blocks/header.php";
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $connect = mysqli_connect("std-mysql.ist.mospolytech.ru", "std_1560_kr_test", "Silchenko2002", "std_1560_kr_test");
    
    $result = mysqli_query($connect, "SELECT * FROM pages");
    while($row = mysqli_fetch_assoc($result)) echo "<h1>".$row['title']."</h1><p>".$row['content']."</p><br>";

    $connect = "
    <p>Первое: ".$name."<br> Второе: ".$all."</p><br>
    ";

    require "blocks/footer.php";
?> 