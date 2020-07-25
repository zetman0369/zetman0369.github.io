<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
connectDB();
global $conn;
    $ten=trim($_POST['ten']);
    $ten=str_replace("'","&#39;",$ten);
    $danh_muc=$_POST['danh_muc'];
    $gia=trim($_POST['gia']);
    if($gia==""){$gia=0;}
    $ten_file_anh=$_FILES['hinh_anh']['name'];
    $trang_chu=$_POST['trang_chu'];
    $noi_bat=$_POST['noi_bat'];
    $noi_dung=$_POST['noi_dung'];
    $noi_dung=str_replace("'","&#39;",$noi_dung);
    $tv_m="select max(sap_xep_trang_chu) from products";
    $tv_m_1=mysqli_query($conn,$tv_m);
    $tv_m_2=mysqli_fetch_array($tv_m_1);
    $sap_xep_trang_chu=$tv_m_2[0]+1;
    if($ten!="")
    {
        if($ten_file_anh!="")
        {
            $tv_k="select count(*) from products where images ='$ten_file_anh' ";
            $tv_k_1=mysqli_query($conn,$tv_k);
            $tv_k_2=mysqli_fetch_array($tv_k_1);
            if($tv_k_2[0]==0)
            {
                $tv="
                INSERT INTO products (
                name ,
                price ,
                images ,
                des ,
                idmenu ,
                noi_bat,
                trang_chu ,
                sap_xep_trang_chu
                )
                VALUES (
                '$ten',
                '$gia',
                '$ten_file_anh',
                '$noi_dung',
                '$danh_muc',
                '$trang_chu',
                '$noi_bat',
                '$sap_xep_trang_chu'
                );";
                mysqli_query($conn,$tv);
                $duong_dan_anh="../../images/product_imags/".$ten_file_anh;
                move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$duong_dan_anh);

                $_SESSION['danh_muc_menu']=$danh_muc;
                $_SESSION['tuy_chon_trang_chu']=$trang_chu;
            }
            else
            {
                ?>    <script type="text/javascript">
                alert("Hình ảnh bị trùng tên!");
                </script><?php
            }
        }
        else
        {
            thong_bao_html("Chưa chọn ảnh");
            ?>    <script type="text/javascript">
                alert("Chưa chọn ảnh");
                </script><?php
        }
    }
    else
    {
        ?>    <script type="text/javascript">
                alert("Tên sản phẩm chưa được điền vào!");
                </script><?php
    }
?>