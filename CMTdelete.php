
    <?php
    $customerID = $_REQUEST['customerID'];
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbName = "bookstoree";
    $conn = mysqli_connect($hostname, $username, $password);
    if (!$conn)
        die("ไม่สามารถติดต่อกับ MySQL ได้");
    mysqli_select_db($conn, $dbName) or die("ไม่สามารถเลือกฐานข้อมูล bookStoree ได้");

    $sql = "delete from customer where customerID = '$customerID'";
    mysqli_query($conn, $sql) or die ("delete จากตาราง customer มีข้อผิดพลาดเกิดขึ้น".mysqli_error());
    mysqli_close($conn);

    header("location:CTMlist.php");
    ?>
