<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,    initial-scale=1.0">
    <title>Document</title>
</head>

<body>
 <h3 align="center" style="color:blue;font-size:40px;">Thêm mới người dùng</h3>
 <form method="post" style="margin-left:25%;">
    <table >
        <tr>
            <td>ID</td>
            <td>
                <input type="text" name="txtID" id="txtID">
            </td>
        </tr>
        <tr>
            <td>Họ Tên </td>
            <td>
                <input type="text" name="txtName" id="txtName">
            </td>
        </tr>
        <tr>
            <td>Ngày Sinh</td>
            <td>
                <input type="date" name="txtngaysinh" id="txtngaysinh">
            </td>
        </tr>
        <tr>
            <td>Giới Tính</td>
            <td>
                <input type="radio" name="rdgioitinh"  value="1" checked="checked">Nam<br>
                <input type="radio" name="rdgioitinh"  value="0">Nữ<br>

            </td>
        </tr>
        <tr>
            <td>Quê Quán</td>
            <td>
                <textarea name="txtquequan" id="txtquequan"> </textarea>
            </td>
        </tr>
        <tr>
            <td>Trình độ học vấn </td>
            <td>
                <input type="radio" name="txttrinhdo" checked="checked" value="0"  >Tiến sĩ<br>
                <input type="radio" name="txttrinhdo" value="1" >Thạc sĩ<br>
                <input type="radio" name="txttrinhdo" value="2" >Kỹ sư<br>
                <input type="radio" name="txttrinhdo" value="3">Khác<br>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" name="btnluu" id="btnluu">Lưu</button>
            </td>
        </tr>
    </table>
    <a href="them.php">Quay lại</a>
</form>
<?php
if($_SERVER['REQUEST_METHOD']== "POST" and isset($_POST['btnluu'])){
    InsertData();
}
function InsertData()
{
        //step 1 : connect db
    $ID = $_POST['txtID'];
    $Name = $_POST['txtName'];
    $ngaysinh = $_POST['txtngaysinh'];
    $gioitinh=$_POST['rdgioitinh'];
    $quequan= $_POST['txtquequan'];
    $trinhdo= $_POST['txttrinhdo'];

    $conn = mysqli_connect("localhost", "root", "", "QLSV_NGUYENVANTRUONG");
    if ($conn != true) {
        die("connect error" . mysqli_connect_error());
    } else {
                //step 2 . wrrite query
        $query = "INSERT INTO tblsinhvien VALUES ('".$ID."','".$Name."','".$ngaysinh."','".$gioitinh."','".$quequan."','".$trinhdo."')";
                //step 3. excute
        $result = mysqli_query($conn, $query);

                //step 4. check data
        if ($result == true) {
            echo "Thêm thành công";
                // header('location:them.php');
        } else {
            echo "Data is empty".mysqli_error($conn);
           
        }
    }
    mysqli_close($conn);
}

?>

</body>

</html>