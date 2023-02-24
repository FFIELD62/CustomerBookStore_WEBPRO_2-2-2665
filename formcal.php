<html>
<head>
    <title> </title>
    <meta charset="UTF-8">
</head>
<body>
<center>
<?php 
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
?>
    <h1>ข้อมูลลูกค้า</h1>
<?php
            echo "ชื่อ-นามสกุล : ".$fullname."<br>";
            echo "ที่อยู่ : ".$address."<br>";
            echo "อีเมล : ".$email."<br>";
            echo "หมายเลขโทรศัพท์ : ".$tel;

        if(empty(trim($fullname))||empty(trim($address))||empty(trim($email))||empty(trim($tel)))
        {
            echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน'); history.back(); </script>";
            exit();
        }
        else if(!preg_match("/^[กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรลวศษสหฬ่้๋ำอฮะาิีืเแโใไๆ่้๊a-zA-Z ]+$/", $fullname))
        {
            echo "<script>alert('Not use some character'); history.back(); </script>";
            exit();
        }
        else if(!filter_var(trim($email), FILTER_VALIDATE_EMAIL))
        {
            echo "<script>alert('$email is not a vaild email address'); history.back(); </script>";
            exit();
        }

        else if(!ctype_digit(trim($tel)))
        {
            echo "<script>alert('กรุณากรอก หมายเลขโทรศัพท์ให้ถูกต้อง'); history.back(); </script>";
            exit();
        }

        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbName = "bookstoree";

        $conn = mysqli_connect($hostname, $username, $password);
        echo '<center>';
        if (!$conn)
            die("ไม่สามารถติดต่อกับ mySQL ได้");

        mysqli_select_db($conn, $dbName) or die("ไม่สามารถเลือกฐานข้อมูล bookStore ได้");

        mysqli_query($conn, "set character_set_connection=utf8mb4");
        mysqli_query($conn, "set character_set_client=utf8mb4");
        mysqli_query($conn, "set character_set_results=utf8mb4");

        $sql = "insert into customer(customerName, customerAddress, customerEmail, customerTel) values ('$fullname', '$address', '$email', '$tel')";

        mysqli_query($conn, $sql) or die("insert ลดตาราง customer มีข้อผิดพลาดเกิดขึ้น" .mysqli_error());

        echo '<br><br><h2>บันทึกข้อมูลลูกค้าชื่อ '.$fullname.' เรียบร้อย</h2>';

        echo "<br><br><br>";
        echo '<td><a href="CTMlist.php?customerID=">รายชื่อลูกค้า</a></td>';
?>   

</center>
</body>
</html>