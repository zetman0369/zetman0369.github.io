
<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
connectDB();
global $conn;
    $id=$_GET['id'];
    $tv="DELETE FROM bill WHERE id = $id ";
    mysqli_query($conn,$tv);
?>