
<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
connectDB();
global $conn;
    $id=$_GET['id'];
 
    $tv="select * from products where id='$id' ";
    $tv_1=mysqli_query($conn,$tv);
    $tv_2=mysqli_fetch_array($tv_1);

    $link_hinh="../../images/product_imags/".$tv_2['images'];
    if(is_file($link_hinh)) 
    {
        unlink($link_hinh);
    }
 
    $tv="DELETE FROM products WHERE id = $id ";
    mysqli_query($conn,$tv);
?>

