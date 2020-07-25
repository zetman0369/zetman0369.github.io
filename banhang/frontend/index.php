<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$_SESSION['trang_chi_tiet_gio_hang']="co";
session_start();
include("../backend/database.php");
function trang_truoc(){
    ?>
        <html><head>
          
          <title>Đang chuyển về trang trước</title></head>
        <body>
            <script type="text/javascript">
                window.history.back();
            </script>   
        </body>
        </html>
    <?php
}
function thong_bao_html_roi_chuyen_trang($chuoi_thong_bao,$link_chuyen_trang)
{
    $lien_ket_trang_truoc=$_SERVER['HTTP_REFERER'];
    ?>
        <html><head>
          <meta charset="UTF-8">
          <title>Thông báo</title></head>
        <body>
            <script type="text/javascript">
                alert("<?php echo $chuoi_thong_bao; ?>");
                window.location="<?php echo $link_chuyen_trang; ?>";
            </script>
        </body>
        </html>
    <?php
    exit();
}
if(isset($_POST['thong_tin_khach_hang']))
{
    shopped();
}
if(isset($_POST['cap_nhat_gio_hang']))
{
    cart_update();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>I Sell Things</title>
        <link rel="stylesheet" type="text/css" href="./css.css" />
        <style>
            div#qctrai{
                background: whitesmoke;
                width: 230px;
                left: 5px;
                position:fixed;
            }
            div#qcphai{
                background: whitesmoke;
                width: 230px;
                right: 5px;
                position:fixed;
                display:block;
            }
            #vm {
                line-height: 45px;  
            }
        </style>
    </head>
    <body>
        <div id="qctrai">
            <?php quangcaotrai();?>
        </div>
        <div id="qcphai">
            <?php quangcaophai();?>
        </div>
        <center>
            <table width="990px" marginheight="0" >
                <tr>
                    <td colspan="3"><?php banner();?></td>
                </tr>
                <tr>
                    <td colspan="2" height="50px" style="background-color: whitesmoke">
                        <div class="hor_menu">
                            <?php hor_menu();?>
                        </div>
                    </td>
                    <td width="250px" style="background-color: whitesmoke">
                        <center>
                            <form>
                                <input type="hidden" name="thamso" value="tim_kiem" >
                                <input type="text" name="tu_khoa" value="" style="margin-top:10px;margin-bottom:10px;" >
                                <input type="submit" value="Tìm" >
                            </form>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td width="170px" height="1265"valign="top" style="background-color: whitesmoke">
                        <div class='ver_menu' >
                            <div id="vm"><?php ver_menu();?></div>
                                <?php moi();?>
                        </div>
                    </td>
                    <td colspan="2" width="650px" valign="top" style="background-color: whitesmoke"><?php dofunction()?></td>
                </tr>
                <tr>
                    <td colspan="3" style="background-color: whitesmoke"><?php footer();?></td>
                </tr>
            </table>
        </center>
    </body>
</html>
<?php disconnectDB()?>