<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

 <?php
    echo "<center>";
    echo "<br><h3>รายชื่อลูกค้า</h3>";
    echo '<table width = "800" border = "0"';
    echo '<tr><td align = "left"><a href = "formdata.php">เพิ่มข้อมูลลูกค้า</a></td><tr></table>';
    echo '<br> <table while="800" border="1">';

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbName = "bookstoree";
    $conn = mysqli_connect($hostname, $username, $password);
    if (!$conn)
        die("ไม่สามารถติดต่อกับ MySQL ได้");
    mysqli_select_db($conn, $dbName) or die("ไม่สามารถเลือกฐานข้อมูล bookStore ได้");

    mysqli_query($conn, "set character_set_connection=utf8mb4");
    mysqli_query($conn, "set character_set_client=utf8mb4");
    mysqli_query($conn, "set character_set_results=utf8mb4");

    $sql = "select * from customer order by customerID";
    $result = mysqli_query ($conn, $sql);

    
    echo '<tr bgcolor = "">';
    echo '<th width = "150">รหัส</th>';
    echo '<th width = "200">ชื่อ-สกุล</th>';
    echo '<th width = "200">ที่อยู่</th>';
    echo '<th width = "200">อีเมล์</th>';
    echo '<th width = "200">หมายเลขโทรีศัพท์</th>';
    echo '<th width = "80">แก้ไข</th>';
    echo '<th width = "80">ลบ</th></tr>';

    while ($rs = mysqli_fetch_array($result)) {
        echo '<tr align="center" bgcolor="">';
        echo '<td>'.$rs["customerID"].'</td>';
        echo '<td align="left">'.$rs["customerName"].'</td>';
        echo '<td align = "left">'.$rs["customerAddress"].'</td>';
        echo '<td align="left">'.$rs["customerEmail"].'</td>';
        echo '<td align="">'.$rs["customerTel"].'</td>';

        echo '<td><a href="CTMupdate.php?customerID='.$rs["customerID"].'">[แก้ไข]</a></td>';

        echo '<td><a href="CMTdelete.php?customerID='.$rs["customerID"].'"onclick="return confirm(\'ยืนยันการลบข้อมูลลูกค้ารหัส '.$rs["customerID"].'\')">[ลบ]</a></td>';
        echo '</tr>';

        echo '</tr>';
    }
    echo '</table>';
    mysqli_close ($conn);
    

?>

</body>
</html>
