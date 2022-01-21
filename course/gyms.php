<?php
    require "blocks/header.php";
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    require "connectdb.php";
    //$connect = mysqli_connect("std-mysql.ist.mospolytech.ru", "std_1560_kr_test", "Silchenko2002", "std_1560_kr_test");
    ?>
    <div class = "fix-footer">
    <?php
    if(empty($_POST['district']))
        echo "Строка пуста!";
    else{
    $search = $_POST['district'];
    
    $query = mysqli_query($connect, "SELECT * FROM `gyms` WHERE `AdmArea` LIKE '%$search%' OR `District` LIKE '%$search%'");
   while($row = mysqli_fetch_assoc($query)){
    if( mysqli_num_rows($query) != 0){
     echo "<table><tr><th>Название</th><th>Адрес</th><th>Электронная почта</th><th>WebSite</th><th>Телефон</th></tr>";
    
    echo "<tr>"; 
    echo "<td>".$row['ObjectName']. "</td>";
    echo "<td>".$row['Address']. "</td>";
    echo "<td>".$row['Email']. "</td>";
    echo "<td>".$row['WebSite']. "</td>";
    echo "<td>".$row['HelpPhone']. "</td>";
    echo "</tr>";
    echo "</table>";}}
?></div>
<?php
if (!$query || mysqli_num_rows($query) == 0)
        echo "<h1>данных нет</h1>";
    }
    require "blocks/footer.php";

    // while($row = mysqli_fetch_assoc($query)) echo "Пункт: ". $row['ObjectName'] ."<br>
    // Количество мест: ". $row['Adress'] ."<br>
    // Административный округ: ". $row['Email'] ."<br>
    // Район: ". $row['WebSite'] ."<br>
    // Адрес: ". $row['HelpPhome'] ."<hr>";

    
    ?> 