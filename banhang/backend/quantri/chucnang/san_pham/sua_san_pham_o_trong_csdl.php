<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
connectDB();
global $conn;
    $ten=trim($_POST['ten']);
    $ten=str_replace("'","&#39;",$ten);
    $gia=trim($_POST['gia']);
    $trang_chu=$_POST['trang_chu'];
    $noi_bat=$_POST['noi_bat'];
    $noi_dung=$_POST['noi_dung'];
    $noi_dung=str_replace("'","&#39;",$noi_dung);
    $ten_file_anh_tai_len=$_FILES['hinh_anh']['name'];
    if($ten_file_anh_tai_len!="")
    {
        $ten_file_anh=$ten_file_anh_tai_len;
    }
    else
    {
        $ten_file_anh=$_POST['ten_anh'];
    }
    $id=$_GET['id'];
    if($ten!="")
    {
        $tv_k="select count(*) from products where images='$ten_file_anh' ";
        $tv_k_1=mysqli_query($conn,$tv_k);
        $tv_k_2=mysqli_fetch_array($tv_k_1);
        if($tv_k_2[0]==0 or $ten_file_anh_tai_len=="")
        {
            $tv="
            UPDATE products SET
            name = '$ten',
            price = '$gia',
            images = '$ten_file_anh',
            des = '$noi_dung',
            idmenu = '$trang_chu',
            noi_bat = '$noi_bat'
            WHERE id =$id;
            ";
            mysqli_query($conn,$tv);
         
            if($ten_file_anh_tai_len!="")
            {             
                $duong_dan_anh="../../images/product_imags/".$ten_file_anh_tai_len;
                move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$duong_dan_anh);
                $duong_dan_anh_cu="../../images/product_imags/".$_POST['ten_anh'];
                unlink($duong_dan_anh_cu);
            }
        }
        else
        {
            ?>    <script type="text/javascript">
                alert("Hình ảnh bị trùng tên");
            </script><?php
        }
    }
    else
    {
        ?>    <script type="text/javascript">
                alert("Tên sản phẩm chưa được điền vào");
            </script><?php
    }
?>

