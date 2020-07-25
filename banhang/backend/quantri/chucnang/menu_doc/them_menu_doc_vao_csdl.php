<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    connectDB();
    global $conn;
    $ten_menu=trim($_POST['ten']);
    $ten_menu=str_replace("'","&#39;",$ten_menu);
    if($ten_menu!="")
    {
        $tv="
        INSERT INTO ver_menu (
        name
        )
        VALUES (
        '$ten_menu'
        );";
        mysqli_query($conn,$tv);
        ?>
            <script type="text/javascript">
                alert("Thêm menu thành công!");
                window.location="http://localhost/banhang/backend/quantri/indexqt.php?thamso=them_menu_doc";
               
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