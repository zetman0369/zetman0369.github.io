<?php
    if(!isset($bien_bao_mat)){exit();}
    connectDB();
    global $conn;
    $ten_menu=trim($_POST['ten']);
    $ten_menu=str_replace("'","&#39;",$ten_menu);
    $loai_menu=$_POST['loai_menu'];
    $noi_dung=$_POST['noi_dung'];
    $noi_dung=str_replace("'","&#39;",$noi_dung);
    $id=$_GET['id'];
    if($ten_menu!="")
    {
        $tv="
        UPDATE hor_menu SET
        name = '$ten_menu',
        content = '$noi_dung',
        menu_type = '$loai_menu'
        WHERE id =$id;
        ";
        mysqli_query($conn,$tv);
        ?>
            <script type="text/javascript">
                alert("Sửa thành công!");
            </script>
        <?php
    }
    else
    {
        thong_bao_html("Tên menu chưa được điền vào");
    }
?>