<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<style type="text/css" >
    a.lk_1{font-size:22px;text-decoration:none;color:blue;margin-right:30px}
    a.lk_1:hover {color:red}
</style>
<br>
<center>
<a href="indexqt.php" style="font-size:72px;color:blue;text-decoration:none" >Quản trị cửa hàng</a>
</center>
<br><br>
<table width="990px" >
    <tr>
        <td width="800px">
            <a href="indexqt.php" class="lk_1" >Trang chủ</a>
            <a href="?thamso=menu_doc" class="lk_1" >Menu dọc</a>
            <a href="?thamso=menu_ngang" class="lk_1" >Menu ngang</a>
            <a href="?thamso=san_pham" class="lk_1" >Sản phẩm</a>
            <a href="?thamso=hoa_don" class="lk_1" >Hóa đơn</a>
        </td>
        <td align="right" >
            <a href="?thamso=thoat" class="lk_1" >Thoát</a>
        </td>
    </tr>
</table>
<br><br>
<?php
    include("chucnang/quantri2/dieuhuong.php");
?>
<br><br>
<table width="990px" >
    <tr>
        <td width="445px" align="right">
            Cửa hàng :
        </td>
        <td width="445px" >
            ten_cua_hang
        </td>
    </tr>
    <tr>
        <td align="right" >
            Quản trị viên :
        </td>
        <td>
            ten_quan_tri_vien
        </td>
    </tr>
    <tr>
        <td align="right" >
            Điện thoại :
        </td>
        <td>
            so_dien_thoai
        </td>
    </tr>
</table>
