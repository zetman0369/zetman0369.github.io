<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    connectDB();
    global $conn;
    $ten_menu=trim($_POST['ten']);
    $ten_menu=str_replace("'","&#39;",$ten_menu);
    $id=$_GET['id'];
    if($ten_menu!="")
    {
        $tv="
        UPDATE ver_menu SET
        name = '$ten_menu'
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
        ?>    <script type="text/javascript">
                alert("Tên menu chưa được điền vào!");
            </script><?php
    }
?>