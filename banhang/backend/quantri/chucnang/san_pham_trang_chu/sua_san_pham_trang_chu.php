<?php
    if(!isset($bien_bao_mat)){exit();}
connectDB();
global $conn;
    for($i=1;$i<=10;$i++)
    {
        $ten_select="select_".$i;
        $ten_input="input_".$i;
        $ten_id="id_".$i;
        if(isset($_POST[$ten_id]))
        {
            $id=$_POST[$ten_id];
            $trang_chu=$_POST[$ten_select];
            $sap_xep_trang_chu=$_POST[$ten_input];
            $tv="update products set
                    trang_chu='$trang_chu',
                    sap_xep_trang_chu='$sap_xep_trang_chu'
                    where id='$id';
            ";
            mysqli_query($conn,$tv);
        }
    }
?>