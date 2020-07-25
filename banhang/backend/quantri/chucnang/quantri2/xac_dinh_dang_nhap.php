<?php
    if(!isset($bien_bao_mat)){exit("Không thể truy cập");}
    connectDB();
    global $conn;
    function thong_bao_abc($c)
    {
        ?>
            <html><head>
              <meta charset="UTF-8">
              <title>Thông báo</title></head>
            <body>
                <script type="text/javascript">
                    alert("<?php echo $c; ?>");
                    window.location="http://localhost/banhang/backend/quantri/indexqt.php";
                </script>
            </body>
            </html>       
        <?php
        exit();
    }
     
    if(isset($_POST['dang_nhap_quan_tri']))
    {
        $ky_danh=$_POST['ky_danh'];
        $ky_danh=str_replace("'","",$ky_danh);
        $ky_danh=str_replace('"',"",$ky_danh);
        $mat_khau=md5($_POST['mat_khau']);
        $mat_khau=md5($mat_khau);
        $tv="select count(*) from thong_tin_quan_tri where username='$ky_danh' and password='$mat_khau' ";
        $tv_1=mysqli_query($conn,$tv);
        $tv_2= mysqli_fetch_assoc($tv_1);
        if($tv_2['count(*)']==1)
        {
            $_SESSION['ky_danh']=$ky_danh;
            $_SESSION['mat_khau']=$mat_khau;
        }
        else
        {
            thong_bao_abc("Thông tin nhập vào không đúng");
        }
    }
   
    if(isset($_SESSION['ky_danh']))
    {
        $ky_danh=$_SESSION['ky_danh'];
        $mat_khau=$_SESSION['mat_khau'];
        $tv="select count(*) from thong_tin_quan_tri where username='$ky_danh' and password='$mat_khau' ";
        $tv_1=mysqli_query($conn,$tv);
        $tv_2= mysqli_fetch_assoc($tv_1);
        if($tv_2['count(*)']==1)
        {
            $xac_dinh_dang_nhap="co";
        }
    }
    //session_destroy();
?> 