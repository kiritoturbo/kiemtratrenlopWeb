<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title style="font-size: 60px">Đơn vị</title>
    <style type="text/css">
        table,tr,td,th{
            border: solid 1px black;
            border-spacing: 0px;

        }
        td, th{
            padding: 8px;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>

<body>
    <h3 align="center" style="color:blue;font-size: 40px;">Bài Thực Hành</h3>
    <div style="margin-left: 25%;">
    <a href="hienthi.php">Thêm mới</a>
    <form method="post">
        <input type="text" name="txtSearch">
        <button type="submit" name="btnSearch">Search</button>
    </form>
   
    <?php
    //step 1 : connect db
    $conn = mysqli_connect("localhost", "root", "", "QLSV_NGUYENVANTRUONG");
    if ($conn != true) {
        die("connect error" . mysqli_connect_errno());
    } else {
        //step 2 . wrrite query
        $query = "SELECT * FRoM  tblsinhvien";

        //step 3. excute
        $result = mysqli_query($conn, $query);

        //step 4. check data
        if ($result != null && mysqli_num_rows($result) > 0) {
            echo "<table id='tblMain'><thead>";
            echo "<th>id </th> <th>Họ Tên  </th><th>Ngày sinh</th><th>Giới tính </th><th>Quê quán</th><th>Trình độ học vấn </th><th>Thao tác</th>";
            echo "</thead><tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>
                    <td> " . $row["hoten"] . "</td>
                    <td>" . $row["ngaysinh"] . "</td>
                    <td> " . $row["gioitinh"] . "</td>
                    <td>" . $row["quequan"] . "</td>
                    <td>" . $row["trinhdohocvan"] . "</td>" . "
                    <td>" . "<a href = 'sua.php?id=".$row['id']."'>Sửa</a>" . " " .
                    "<a onclick='return confirm(\"Bạn có muốn xóa ko \")' href = 'xoa.php?id=".$row['id']."'>Xóa</a>" . "</td>";
                // echo "</td>";

                echo"</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "Data is empty";
        }
    }

    ?>

    <?php
        if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['btnSearch'])){
            Search();
        }
        function Search()
        {
            echo"<script type='text/javascript'>var Main =document.getElementById('tblMain');Main.innerHTML=' ';</script>";
            $KeyWord=$_POST['txtSearch'];
          
            $KeyWor=$_POST['txtSearch'];
            
            $conn = mysqli_connect("localhost", "root", "", "QLSV_NGUYENVANTRUONG");
         if ($conn != true) {
               die("connect error" . mysqli_connect_errno());
        } else {
        //step 2 . wrrite query
        // $query = "SELECT * FRoM  tblsinhvien where hoten LIKE N'%".$KeyWord."%'";
        $query =  "SELECT * FROM  tblsinhvien WHERE HoTen LIKE N'%".$KeyWord."%' or QueQuan LIKE N'%".$KeyWor."%'";

        //step 3. excute
        $result = mysqli_query($conn, $query);

        //step 4. check data
        if ($result != null && mysqli_num_rows($result) > 0) {
            echo "<table ><thead>";
            echo "<th>id </th> <th>Họ tên</th><th>Ngày sinh</th><th>Giới tính</th><th>Quê quán</th><th>Trình độ học vấn</th><th>Thao tác</th>";
            echo "</thead><tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                 echo "<td>" . $row["id"] . "</td>
                    <td> " . $row["hoten"] . "</td>
                    <td>" . $row["ngaysinh"] . "</td>
                    <td> " . $row["gioitinh"] . "</td>
                    <td>" . $row["quequan"] . "</td>
                    <td>" . $row["trinhdohocvan"] . "</td>" . "
                    <td>" . "<a href = 'sua.php?id=".$row['id']."'>Sửa</a>" . " " .
                    "<a href = 'xoa.php?id=".$row['id']."'>Xóa</a>" . "</td>";
                // echo "</td>";
                echo"</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "Data is empty";
        }
    }
        }
    ?>
    </div>
    
</body>

</html>


