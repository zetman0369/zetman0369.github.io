
<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    connectDB();
    global $conn;
    $id=$_GET['id'];
    $tv="select count(*) from products where idmenu='$id' ";
    $tv_1=mysqli_query($conn,$tv);
    $tv_2=mysqli_fetch_array($tv_1);
    if($tv_2[0]==0)
    {
        $truy_van_xoa="DELETE FROM ver_menu WHERE id = $id ";
        mysqli_query($conn,$truy_van_xoa);
    }
    else
    {
        ?>
            <script type="text/javascript">
                alert("Menu này vẫn còn dữ liệu nên không thể xóa");         
            </script>
        <?php
    }
?>
