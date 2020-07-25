<?php
    if(!isset($bien_bao_mat)){exit();}
    connectDB();
    global $conn;
    $id=$_GET['id'];
    $tv="DELETE FROM hor_menu WHERE id = $id ";
    mysqli_query($conn,$tv);
?>