<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
connectDB();
global $conn;
    $tv="select * from thong_tin_quan_tri where id='1' ";
    $tv_1=mysqli_query($conn,$tv);
    $tv_2=mysqli_fetch_array($tv_1);
    $ky_danh=$_POST['ky_danh'];
    $mat_khau=$tv_2['password'];

    $mat_khau_tu_form=trim($_POST['mat_khau']);
    if($mat_khau_tu_form!="khong_doi")
    {
        $mat_khau=md5($mat_khau_tu_form);
        $mat_khau=md5($mat_khau);
    }

    $tv="
    UPDATE thong_tin_quan_tri SET
    username = '$ky_danh',
    password = '$mat_khau'
    WHERE id =1;
    ";
    mysqli_query($conn,$tv);
   
    $_SESSION['ky_danh']=$ky_danh;
    $_SESSION['mat_khau']=$mat_khau;         
?>
<script type="text/javascript">alert("Đã cập nhật lại thông tin quản trị")</script>