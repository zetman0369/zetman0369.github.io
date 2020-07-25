
<?php
    if(!isset($bien_bao_mat)){exit();}
connectDB();
global $conn;
    for($i=1;$i<=10;$i++)
    {
        $ten_select="select_".$i;
        $ten_id="id_".$i;
        if(isset($_POST[$ten_id]))
        {
            $id=$_POST[$ten_id];
            $noi_bat=$_POST[$ten_select];
            $tv="update products set
                    noi_bat='$noi_bat'
                    where id='$id';
            ";
            mysqli_query($conn,$tv);
        }
    }
?>