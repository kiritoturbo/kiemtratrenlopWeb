 <?php
       $_madv = $_GET['id'];
    $conn = mysqli_connect("localhost", "root", "", "QLSV_NGUYENVANTRUONG");
        if ($conn != true) {
            die("kết nối thất bại " . mysqli_connect_error());
        } else {
            //step 2 . wrrite query
            $query = "DELETE FROM tblsinhvien WHERE id='".$_madv."'";
            //step 3. excute
            $result = mysqli_query($conn, $query);


            //step 4. check data
            if ($result == true) {
                echo "xóa thành công";
                header('location:them.php');
            } else {
                echo "Data is empty".mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    
 ?>


