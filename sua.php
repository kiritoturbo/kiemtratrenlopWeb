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
        $_id = $_GET['id'];
        $conn = mysqli_connect("localhost", "root", "", "QLSV_NGUYENVANTRUONG");
        if ($conn != true) {
            die("connect error" . mysqli_connect_errno());
        } else {
            $query = "SELECT * FROM  tblsinhvien WHERE id = '$_id'";
            $result = mysqli_query($conn, $query);
            if ($result != null && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                   $id = $row["id"];
                   $hoten = $row["hoten"];
                   $ngaysinh = $row["ngaysinh"];
                   $gioitinh = $row["gioitinh"];
                   $quequan = $row["quequan"];
                   $trinhdo = $row["trinhdohocvan"];
                }
            } else {
                echo "Data is empty";
            }
        }
    ?>
    
    <h3 align="center" style="color:blue;font-size:40px;" >Sửa thông tin </h3>
    <form method="post" style="margin-left: 25%;" >
        <table >
            <tr>
                <td>id</td>
                <td>
                    <input type="text" name="txtID" id="txtID" value="<?php echo $id ?>">
                </td>
            </tr>
            <tr>
                <td>Họ Tên  </td>
                <td>
                    <input type="text" name="txtName" id="txtName" value="<?php echo $hoten ?>">
                </td>
            </tr>
            <tr>
                <td>Ngày Sinh</td>
                <td>
                    <input type="text" name="txtngaysinh" id="txtngaysinh" value="<?php echo $ngaysinh ?>">
                </td>
            </tr>
            <tr>
                <td>Giới Tính </td>
                <td>
                    <input type="radio" name="txtgioitinh"value="1"  checked="checked" value="<?php echo $gioitinh ?>">Nam<br>
                    <input type="radio" name="txtgioitinh"value="0" value="<?php echo $gioitinh ?>">Nữ<br>
                </td>
            </tr>
            <tr>
                <td>Quê quán </td>
                <td>
                    <input type="" name="txtquequan" id="txtquequan" value="<?php echo $quequan ?>">
                </td>
            </tr>
            <tr>
                <td>Trình độ học vấn  </td>
                <td>
                    <input type="radio" name="txttrinhdo" checked="checked" value="0" value="<?php echo $trinhdo ?>">tiến sĩ <br>
                    <input type="radio" name="txttrinhdo" value="1" value="<?php echo $trinhdo ?>">thạc sĩ <br>
                    <input type="radio" name="txttrinhdo" value="2" value="<?php echo $trinhdo ?>">kĩ sư<br>
                    <input type="radio" name="txttrinhdo" value="3" value="<?php echo $trinhdo ?>">khác<br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" id="btnluu" name="btnluu">Lưu</button>
                </td>
            </tr>
             <a href="them.php">Quay lại</a>
        </table>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD']== "POST" and isset($_POST['btnluu'])){
            $ID=$_POST['txtID'];
            CheckData($ID);
            UpdateData();
        }
        function CheckData($ID){
            
        }
        function UpdateData()
        {
            //step 1 : connect db
            $ID = $_POST['txtID'];
            $Name = $_POST['txtName'];
            $ngaysinh = $_POST['txtngaysinh'];
            $gioitinh = $_POST['txtgioitinh'];
            $quequan = $_POST['txtquequan'];
            $trinhdo = $_POST['txttrinhdo'];
            $conn = mysqli_connect("localhost", "root", "", "QLSV_NGUYENVANTRUONG");
            if ($conn != true) {
                die("connect error" . mysqli_connect_errno());
            } else {
                $query = "UPDATE tblsinhvien SET id ='".$ID."', hoten='".$Name."', ngaysinh='". $ngaysinh."', gioitinh='".$gioitinh."', quequan='".$quequan."', trinhdohocvan='".$trinhdo."' WHERE id='".$ID."'";
                $result = mysqli_query($conn, $query);
                if ($result == true) {
                    header('location:them.php');
                    echo "cập nhập thành công";
                } else {
                    echo "Insert data error".mysqli_errno($conn);
                }
            }
            mysqli_close($conn);
        }
    ?>
   
</body>

</html>