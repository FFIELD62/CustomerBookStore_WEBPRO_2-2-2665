<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    
<form action="formcal.php" method="post" name="form1" id="form1">
<table border="1" align="center" width="700">
    <tr>
        <td colspan="2" align="center">
            <big> เพิ่มข้อมูลลูกค้า </big>
        </td>
    </tr> 

    <tr>
        <td colspan="2"><font color = red> *required field </font></td>
    </tr> 

    <tr>
        <td> ชื่อ-นามสกุล : </td>
        <td><input type="text" name="fullname" size="60"/> </td>
    </tr>

    <tr>
        <td> ที่อยู่ : </td>
        <td>
            <textarea name = "address" cols="55" rows="5" required></textarea><font color = "red">*</font>
        </td>
        
    </tr>

    <tr>
        <td> อีเมล : </td>
        <td><input type="text" name="email" size="60" placeholder = "E-Mail"/></td>
    </tr>

    <tr>
        <td> หมายเลขโทรศัพท์ : </td>
        <td><input type="text" name="tel" size="13" maxlength = "13" minlength = "10"/> </td>
    </tr>
</table>

<br>
<center>
<input type="submit" name="btnSubmit" value="บันทึกข้อมูล" /> <input type="reset" name="reset" value="ล้างข้อมูล" />
<br>
<br>

<?php
    echo '<td><a href="CTMlist.php?customerID=">รายชื่อลูกค้า</a></td>';
?>
</center>

</form>
    
</body>
</html>