<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
connectDB();
global $conn;
    $id=$_GET['id'];   
    $tv="select * from slideshow where id='$id' ";
    $tv_1=mysqli_query($conn,$tv);
    $tv_2=mysqli_fetch_array($tv_1);

    $link_hinh="../../images/slideshow/".$tv_2['hinh'];
    if(is_file($link_hinh))   
    {
        unlink($link_hinh);
    }
   
    $tv="DELETE FROM slideshow WHERE id = $id ";
    mysqli_query($conn,$tv);
?>

