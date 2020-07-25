<?php
    session_start();
    $bien_bao_mat="co";
    include("../database.php");  
    include("chucnang/quantri2/xac_dinh_dang_nhap.php");
    include("chucnang/quantri2/ham.php");
    if(isset($xac_dinh_dang_nhap))
    {
        if($xac_dinh_dang_nhap=="co")
       {
             include("chucnang/quantri2/xu_ly_post_get.php");
        }   
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Quản trị</title>
        <script src="./phan_bo_tro/ckeditor/ckeditor.js"></script>
        <link rel="stylesheet" type="text/css" href="giao_dien/giao_dien.css">
    </head>
    <body>
        <?php
            if(!isset($xac_dinh_dang_nhap))
            {
                include("chucnang/quantri2/khung_dang_nhap.php");
            }
            else
            {
                if($xac_dinh_dang_nhap=="co")
                {
                    echo "<center>";
                    include("chucnang/quantri2/trang_chu.php");
                    echo "</center>";
                }
            }
        ?>
    </body>
</html>