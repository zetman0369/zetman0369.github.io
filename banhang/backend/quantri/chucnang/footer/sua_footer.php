<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
connectDB();
global $conn;
    $tv="select * from footer limit 0,1 ";
    $tv_1=mysqli_query($conn,$tv);
    $tv_2=mysqli_fetch_array($tv_1);
    $noi_dung=$tv_2['html'];
?>
<form action="" method="post" enctype="multipart/form-data" >
    <table width="990px" >
        <tr>
            <td><b style="color:blue;font-size:20px" >Sửa footer</b></td>
        </tr>

        <tr>
            <td align="center" >
                <br>
                <textarea id="noi_dung" name="noi_dung" ><?php echo $noi_dung; ?></textarea>
                <script type="text/javascript">
                  CKEDITOR.replace('noi_dung',{
                  filebrowserBrowseUrl: 'phan_bo_tro/ckfinder/ckfinder.html',
                  filebrowserImageBrowseUrl: 'phan_bo_tro/ckfinder/ckfinder.html?type=Images',
                  filebrowserFlashBrowseUrl: 'phan_bo_tro/ckfinder/ckfinder.html?type=Flash',
                  filebrowserUploadUrl: 'phan_bo_tro/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                  filebrowserImageUploadUrl: 'phan_bo_tro/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                  filebrowserFlashUploadUrl: 'phan_bo_tro/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                });
                  </script>
            </td>
        </tr>
        <tr>
            <td>
                <br>
                <input type="submit" name="bieu_mau_sua_footer" value="Sửa footer" style="width:200px;height:50px;font-size:24px" >
            </td>
        </tr>
    </table>
</form>