<?php
    if(!isset($bien_bao_mat)){exit();}
    connectDB();
    global $conn;
    $ten_menu=trim($_POST['ten']);
    $ten_menu=str_replace("'","&#39;",$ten_menu);
    $loai_menu=$_POST['loai_menu'];
    $noi_dung=$_POST['noi_dung'];
    $noi_dung=str_replace("'","&#39;",$noi_dung);
    if($ten_menu!="")
    {
        $tv="
        INSERT INTO hor_menu (
        name ,
        content ,
        menu_type
        )
        VALUES (
        '$ten_menu',
        '$noi_dung',
        '$loai_menu'
        );";
        mysqli_query($conn,$tv);
        $_SESSION['loai_menu_wr8']=$loai_menu;
        ?>
            <script type="text/javascript">
                alert("Thêm menu thành công!");
                window.location="http://localhost/banhang/backend/quantri/indexqt.php?thamso=them_menu_ngang";
            </script>
        <?php
    }
    else
    {
        ?>    <script type="text/javascript">
                alert("Tên menu chưa được điền vào!");

            </script><?php
    }
?>