
<?php
$conn=null;
function connectDB(){
    global $conn;
    if(!isset($conn)){
        $conn= mysqli_connect('localhost', 'root', '', 'banhang')
                or die("can't connect database!!!");
    }
}

function disconnectDB(){
    global $conn;
    if(isset($conn)) mysqli_close($conn);
}

function hor_menu(){
    echo "<a href='index.php'>Trang chủ</a>";
    connectDB();
    global $conn;
    $sql="select * from hor_menu order by id";
    $rs=mysqli_query($conn,$sql);
    while($rw=mysqli_fetch_assoc($rs))
    {
        if($rw['menu_type']==""){$link_menu="?thamso=xuat_mot_tin&id=".$rw['id'];}
        if($rw['menu_type']=="product"){$link_menu="?thamso=xuat_san_pham_2";}
        echo "<a href='$link_menu'>";
        echo $rw['name'];
        echo "</a>";
    }
    echo "<a href='index.php?thamso=gio_hang'>Giỏ hàng</a>";
}

function ver_menu(){
    connectDB();
    global $conn;
    $sql="select * from ver_menu order by id";
    $rs=mysqli_query($conn,$sql);
    while($rw=  mysqli_fetch_assoc($rs))
    {
        $link="?thamso=xuat_san_pham&id=".$rw['id'];
        echo "<a href='$link'>";
            echo $rw['name'];
        echo "</a>";
    }
}

function showproducts(){
    connectDB();
    global $conn;
    $id=$_GET['id'];
    $so_du_lieu=9;
    $sql="select count(*) from products where idmenu='$id'";
    $rs=mysqli_query($conn,$sql);
    $rw=  mysqli_fetch_assoc($rs);
    $so_trang=ceil($rw['count(*)']/$so_du_lieu);
    if(!isset($_GET['trang'])){$vtbd=0;}else{$vtbd=($_GET['trang']-1)*$so_du_lieu;}
    $sql="select id,name,price,images,des from products where idmenu='$id' order by id desc limit $vtbd,$so_du_lieu";
    $rs=mysqli_query($conn,$sql);
    echo "<table>";
    while($rw=  mysqli_fetch_assoc($rs))
    {
        echo "<tr>";
            for($i=1;$i<=3;$i++)
            {
                echo "<td align='center' width='255px' valign='top'>";
                    if($rw!=false)
                    {
                        $link_anh="../images/product_imags/".$rw['images'];
                        $detail_link="?thamso=chi_tiet_san_pham&id=".$rw['id'];
                        $gia=$rw['price'];
                        $gia=number_format($gia,0,",",".");
                        echo "<a href='$detail_link'>";
                        echo "<img src='$link_anh' width='250px' height='350px' >";echo "<br>";
                        echo "</a>";
                        echo "<a href='$detail_link'>";
                        echo $rw['name'];echo "<br>";
                        echo "</a>";
                        echo "<a href='$detail_link'>";
                        echo $gia."đ";echo "<br>";echo "<br>";
                        echo "</a>";
                    }
                echo "</td>";
                if($i!=3)
                {
                    $rw=  mysqli_fetch_assoc($rs);
                }
            }
        echo "</tr>";
    }
    echo "<tr>";
        echo "<td colspan='3' align='center' >";
            echo "<div class='phan_trang' >";
                for($i=1;$i<=$so_trang;$i++)
                {
                    $link="?thamso=xuat_san_pham&id=".$_GET['id']."&trang=".$i;
                    echo "<a href='$link' >";
                        echo $i;echo " ";
                    echo "</a>";
                }
            echo "</div>";
        echo "</td>";
    echo "</tr>";
    echo "</table>";
}

function product_details(){
    $_SESSION['trang_chi_tiet_gio_hang']="co";
    connectDB();
    global $conn;
    $id=$_GET['id'];
    $sql="select name,price,des,images from products where id='$id'";
    $rs= mysqli_query($conn, $sql);
    $rw= mysqli_fetch_assoc($rs);
    $link_anh = "../images/product_imags/".$rw['images'];
    echo "<table>";
        echo "<tr>";
            echo "<td width='250px' align='center' >";
                echo "<img src='$link_anh' width='200px' >";
            echo "</td>";
            echo "<td valign='top' >";
                echo "<a href='' style='text-decoration: none;'>";
                    echo $rw['name'];
                echo "</a>";
                echo "<br>";
                echo "<br>";
                $gia=$rw['price'];
                $gia=number_format($gia,0,",",".");
                echo $gia."đ";
                echo "<br><br>";
                echo "<form>";
                    echo "<input type='hidden' name='thamso' value='gio_hang' > ";
                    echo "<input type='hidden' name='id' value='".$_GET['id']."' > ";
                    echo "<input type='text' name='so_luong' value='1' style='width:50px' > ";
                    echo "<input type='submit' value='Thêm vào giỏ' style='margin-left:15px' > ";
                echo "</form>";
            echo "</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td colspan='2' >";
                echo "<br>";
                echo "<br>";
                echo $rw['des'];
            echo "</td>";
        echo "</tr>";
    echo "</table>";
}

function showallproducts(){
    connectDB();
    global $conn;
    $so_du_lieu=9;
    $sql="select count(*) from products";
    $rs=mysqli_query($conn,$sql);
    $rw=  mysqli_fetch_assoc($rs);
    $so_trang=ceil($rw['count(*)']/$so_du_lieu);
    if(!isset($_GET['trang'])){$vtbd=0;}else{$vtbd=($_GET['trang']-1)*$so_du_lieu;}
    $sql="select id,name,price,images,des from products order by id desc limit $vtbd,$so_du_lieu";
    $rs=mysqli_query($conn,$sql);
    echo "<table>";
    while($rw=  mysqli_fetch_assoc($rs))
    {
        echo "<tr>";
            for($i=1;$i<=3;$i++)
            {
                echo "<td align='center' width='255px' valign='top'>";
                    if($rw!=false)
                    {
                        $link_anh="../images/product_imags/".$rw['images'];
                        $detail_link="?thamso=chi_tiet_san_pham&id=".$rw['id'];
                        $gia=$rw['price'];
                        $gia=number_format($gia,0,",",".");
                        echo "<a href='$detail_link'>";
                        echo "<img src='$link_anh' width='250px' height='350px' >";echo "<br>";
                        echo "</a>";
                        echo "<a href='$detail_link'>";
                        echo $rw['name'];echo "<br>";
                        echo "</a>";
                        echo "<a href='$detail_link'>";
                        echo $gia."đ";echo "<br>";echo "<br>";
                        echo "</a>";
                    }
                echo "</td>";
                if($i!=3)
                {
                    $rw=  mysqli_fetch_assoc($rs);
                }
            }
        echo "</tr>";
    }
    echo "<tr>";
        echo "<td colspan='3' align='center' >";
            echo "<div class='phan_trang' >";
                for($i=1;$i<=$so_trang;$i++)
                {
                    $link="?thamso=xuat_san_pham_2&trang=".$i;
                    echo "<a href='$link' >";
                        echo $i;echo " ";
                    echo "</a>";
                }
            echo "</div>";
        echo "</td>";
    echo "</tr>";
    echo "</table>";
}

function shownews(){
    connectDB();
    global $conn;
    $id=$_GET['id'];
    $sql="select * from hor_menu where id='$id'";
    $rs=mysqli_query($conn,$sql);
    $rw=  mysqli_fetch_assoc($rs);
    echo "<h1>";
    echo $rw['name'];
    echo "</h1>";
    echo $rw['content'];
}

function search(){
    if(trim($_GET['tu_khoa'])!=""){
        $m=explode(" ",$_GET['tu_khoa']);  
        $chuoi_tim_sql="";
        for($i=0;$i<count($m);$i++)
        {
            $tu=trim($m[$i]);
            if($tu!="")
            {
                if($i!=count($m)-1){
                    $chuoi_tim_sql=$chuoi_tim_sql." name like '%".$tu."%' or";
                }
                else{
                    $chuoi_tim_sql=$chuoi_tim_sql." name like '%".$tu."%'";
                }
            }
        }
        connectDB();
        global $conn;
        $so_du_lieu=9;
        $sql="select count(*) from products where $chuoi_tim_sql";
        $rs=mysqli_query($conn,$sql);
        $rw=  mysqli_fetch_assoc($rs);
        if($rw['count(*)']==0)echo "<br>&nbspKhông tìm thấy sản phầm nào";
        $so_trang=ceil($rw['count(*)']/$so_du_lieu);
        if(!isset($_GET['trang'])){$vtbd=0;}else{$vtbd=($_GET['trang']-1)*$so_du_lieu;}
        $sql="select id,name,price,images,idmenu from products where $chuoi_tim_sql order by id desc limit $vtbd,$so_du_lieu";
        $rs=mysqli_query($conn,$sql);
        echo "<table>";
        while($rw=  mysqli_fetch_assoc($rs))
        {
            echo "<tr>";
                for($i=1;$i<=3;$i++)
                {
                    echo "<td align='center' width='215px' valign='top' >";
                        if($rw!=false)
                        {
                            $link_anh="../images/product_imags/".$rw['images'];
                            $detail_link="?thamso=chi_tiet_san_pham&id=".$rw['id'];
                            $gia=$rw['price'];
                            $gia=number_format($gia,0,",","."); 
                            echo "<a href='$detail_link' >";
                                echo "<img src='$link_anh' width='250px' height='350px' >";
                            echo "</a>";
                            echo "<br>";
                            echo "<a href='$detail_link' >";
                                echo $rw['name'];
                            echo "</a><br>";
                            echo "<a href='$detail_link'>";
                            echo $gia."đ";echo "<br>";echo "<br>";
                            echo "</a>";
                        }
                    echo "</td>";
                    if($i!=3)
                    {
                        $rw=  mysqli_fetch_assoc($rs);
                    }
                }
            echo "</tr>";
        }
        echo "<tr>";
            echo "<td colspan='3' align='center' >";
                echo "<div class='phan_trang' >";
                    for($i=1;$i<=$so_trang;$i++)
                    {
                        $link="?thamso=tim_kiem&tu_khoa=".$_GET['tu_khoa']."&trang=".$i;
                        echo "<a href='$link' >";
                            echo $i;echo " ";
                        echo "</a>";
                    }
                echo "</div>";
            echo "</td>";
        echo "</tr>";
        echo "</table>";   
    }
    else{
        echo "Bạn chưa nhập từ khóa";
    }
}

function cart(){
    if($_SESSION['trang_chi_tiet_gio_hang']=="co"){
        $_SESSION['trang_chi_tiet_gio_hang']="huy_bo";
        if(isset($_SESSION['id_them_vao_gio'])){
            $so=count($_SESSION['id_them_vao_gio']);
            $trung_lap="khong";
            for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++){
                if($_SESSION['id_them_vao_gio'][$i]==$_GET['id']){
                    $trung_lap="co";
                    $vi_tri_trung_lap=$i;
                    break;
                }
            }
            if($trung_lap=="khong"){
                $_SESSION['id_them_vao_gio'][$so]=$_GET['id'];
                $_SESSION['sl_them_vao_gio'][$so]=$_GET['so_luong'];
            }
            if($trung_lap=="co"){
                $_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap]=$_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap]+$_GET['so_luong'];
            }
        }
        else{
            if(isset($_GET['id'])&&isset($_GET['so_luong'])){
                $_SESSION['id_them_vao_gio'][0]=$_GET['id'];
                $_SESSION['sl_them_vao_gio'][0]=$_GET['so_luong'];
            }
        }
    }
    $gio_hang="khong";
    if(isset($_SESSION['id_them_vao_gio'])){
        for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++){
            if($_SESSION['sl_them_vao_gio'][$i]!=0){
                $gio_hang="co";
                break;
            }
        }
    }
    echo "Giỏ hàng ";
    $so_luong=0;
    if(isset($_SESSION['id_them_vao_gio']))
    {
        for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
        {
            $so_luong=$so_luong+$_SESSION['sl_them_vao_gio'][$i];
        }
    }
    echo "( ".$so_luong." sản phẩm )<br><br>";
    if($gio_hang=="khong"){
        echo "Không có sản phẩm trong giỏ hàng";
    }
    else{
        echo "<form action='' method='post' >";
            echo "<input type='hidden' name='cap_nhat_gio_hang' value='co' > ";
            echo "<table>";
                echo "<tr>";
                    echo "<td width='200px' >Tên</td>";
                    echo "<td width='150px' >Số lượng</td>";
                    echo "<td width='150px' >Đơn giá</td>";
                    echo "<td width='170px' >Thành tiền</td>";
                echo "</tr>";
                $tong_cong=0;
                connectDB();
                global $conn;
                for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++){
                    $sql="select id,name,price from products where id='".$_SESSION['id_them_vao_gio'][$i]."'";
                    $rs=mysqli_query($conn,$sql);
                    $rw=mysqli_fetch_array($rs);
                    $tien=0;
                    if($_SESSION['id_them_vao_gio'][$i]!=NULL)$tien=$rw['price']*$_SESSION['sl_them_vao_gio'][$i];
                    $tong_cong=$tong_cong+$tien;
                    if($_SESSION['sl_them_vao_gio'][$i]!=0){
                        $name_id="id_".$i;
                        $name_sl="sl_".$i;
                        echo "<tr>";
                            echo "<td>".$rw['name']."</td>";
                            echo "<td>";
                            echo "<input type='hidden' name='".$name_id."' value='".$_SESSION['id_them_vao_gio'][$i]."' >";
                            echo "<input type='text' style='width:50px' name='".$name_sl."' value='". $_SESSION['sl_them_vao_gio'][$i]."' > ";
                            echo "</td>";
                            $gia=  number_format($rw['price'],0,',','.');
                            echo "<td>".$gia."đ</td>";
                            $tien= number_format($tien,0,',','.');
                            echo "<td>".$tien."đ</td>";
                        echo "</tr>";
                    }
                }
                echo "<tr>"."<td>&nbsp;</td>"."</tr>";
                echo "<tr>";
                    echo "<td>&nbsp;</td>";
                    echo "<td><input type='submit' value='Cập nhật' > </td>";
                    echo "<td>&nbsp;</td>";
                    echo "<td>&nbsp;</td>";
                echo "</tr>";
            echo "</table>";
        echo "</form>";
        echo "<br>";
        echo "Tổng giá trị đơn hàng là : ".$tong_cong= number_format($tong_cong,0,',','.')." VNĐ";
        client_form();
        }
}

function cart_update(){
       for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
    {
        $name_id="id_".$i;
        $name_sl="sl_".$i;
        if(isset($_POST[$name_id]))
        {
            $_SESSION['id_them_vao_gio'][$i]=$_POST[$name_id];
            $_SESSION['sl_them_vao_gio'][$i]=$_POST[$name_sl];
        }
    }
}

function client_form(){
    echo "<br>";
    echo "<br>";
    echo "<form method='post' action='' >";
        echo "<input type='hidden' name='thong_tin_khach_hang' value='co' > ";
        echo "<table>";
            echo "<tr>";
                echo "<td colspan='2' height='30px' >";
                    echo "<b>Thông tin mua hàng</b>";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td height='40px' >Lưu ý : </td>";
                echo "<td>";
                    echo "Tên người mua , địa chỉ , điện thoại bắt buộc phải điền vào";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td width='180px' >Tên người mua :</td>";
                echo "<td>";
                    echo "<input type='text' style='width:400px' name='ten_nguoi_mua' >";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Email : </td>";
                echo "<td>";
                    echo "<input type='text' style='width:400px' name='email' >";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Địa chỉ : </td>";                  
                echo "<td>";
                    echo "<textarea style='width:400px;' name='dia_chi' ></textarea>";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Điện thoại : </td>";
                echo "<td>";
                    echo "<input type='text' style='width:400px' name='dien_thoai' >";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>Nội dung :</td>";
                echo "<td>";
                    echo "<textarea style='width:400px;height:100px' name='noi_dung' ></textarea>";
                echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>&nbsp;</td>";
                echo "<td>";
                    echo "<input type='submit' value='Mua hàng' >";
                echo "</td>";
            echo "</tr>";
        echo "</table>";
    echo "</form>";
}

function shopped(){
     if(isset($_SESSION['id_them_vao_gio']))
    {
        $ten_nguoi_mua=trim($_POST['ten_nguoi_mua']);
        $email=trim($_POST['email']);
        $dien_thoai=trim($_POST['dien_thoai']);
        $dia_chi=trim(nl2br($_POST['dia_chi']));
        $noi_dung=nl2br($_POST['noi_dung']);
        if($ten_nguoi_mua!="" and $dien_thoai!="" and $dia_chi!="")
        {
            connectDB();
            global $conn;
            $hang_duoc_mua="";
            for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
            {
                if(isset($_SESSION['id_them_vao_gio'][$i])&&isset($_SESSION['sl_them_vao_gio'][$i]))
                {
                    $hang_duoc_mua=$hang_duoc_mua.$_SESSION['id_them_vao_gio'][$i]."[|||]".$_SESSION['sl_them_vao_gio'][$i]."[|||||]";
                }
            }      
            $sql="INSERT INTO bill (
            id ,
            clientname ,
            email ,
            address ,
            phonenumber ,
            noi_dung ,
            hang_duoc_mua
            )
            VALUES (
            NULL ,
            '$ten_nguoi_mua',
            '$email',
            '$dia_chi',
            '$dien_thoai',
            '$noi_dung',
            '$hang_duoc_mua'
            );";
            mysqli_query($conn,$sql);
            unset($_SESSION['id_them_vao_gio']);
            unset($_SESSION['sl_them_vao_gio']);
            thong_bao_html_roi_chuyen_trang("Cảm ơn bạn đã mua hàng tại web site chúng tôi","index.php");
        }
        else
        {
            //thong_bao_html("Không được bỏ trống tên người mua , điện thoại , địa chỉ");
            echo "<script type='text/javascript'>";
                echo 'alert("Không được bỏ trống tên người mua , điện thoại , địa chỉ")';
            echo "</script>";
            trang_truoc();
            exit();
        }
    }
}

function moi(){
        ?><br><br>
    Sản phẩm mới <br><br>
    <center>
        <?php
                connectDB();
                global $conn;
            $tv="select id,name,images from products order by id desc limit 0,3";
            $tv_1=mysqli_query($conn,$tv);
            while($tv_2=mysqli_fetch_array($tv_1))
            {
                $link_anh="../images/product_imags/".$tv_2['images'];
                $link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$tv_2['id'];
                echo "<a href='$link_chi_tiet' >";
                    echo "<img src='$link_anh' width='100px' >";
                echo "</a>";
                echo "<br><br>";
                echo $tv_2['name'];
                echo "<br>";
                echo "<br>";
            }
        ?>
    </center><?php
}
function quangcaotrai(){
    ?><br>Quảng cáo <br><br>
    <?php
    connectDB();
    global $conn;
        $tv="select html from quang_cao where vi_tri='trai' ";
        $tv_1=mysqli_query($conn,$tv);
        $tv_2=mysqli_fetch_array($tv_1);
        echo $tv_2['html'];
}
function quangcaophai(){
    ?><br>Quảng cáo <br><br>
    <?php
    connectDB();
    global $conn;
    $tv="select html from quang_cao where vi_tri='phai' ";
    $tv_1=mysqli_query($conn,$tv);
    $tv_2=mysqli_fetch_array($tv_1);
    echo $tv_2['html'];
}
function slideshow(){
    ?><style type="text/css" >
    div.slideshow img {width:600px;height:260px;margin-top: 15px}
</style>
<center>
<div class="slideshow" id="slideshow" >
    <?php
        connectDB();
        global $conn;
    $tv="select hinh,lien_ket from slideshow order by id";
    $tv_1=mysqli_query($conn,$tv);
    while($tv_2=mysqli_fetch_array($tv_1))
    {
        $link_hinh="../images/slideshow/".$tv_2['hinh'];
        echo "<a href='".$tv_2['lien_ket']."'>";
            echo "<img src='".$link_hinh."'>";
        echo "</a>";
    }
    ?>
</div>
</center>
<script type="text/javascript" >
    var i_img=0;
    var div_slideshow=document.getElementById("slideshow");
    var img_slideshow=div_slideshow.getElementsByTagName("img");
    for(var i=0;i<img_slideshow.length;i++)
    {
        img_slideshow[i].style.display="none";
    }
    img_slideshow[0].style.display="block";
  
    setInterval(function(){
        img_slideshow[i_img].style.display="none";
        i_img=i_img+1;
        if(i_img>=img_slideshow.length){i_img=0;}
        img_slideshow[i_img].style.display="block";      
    },5000);
</script><?php
}
function sanphamtrangchu(){
    ?><br><br>
    <div style="margin-left: 15px; font-size: 20px">Sản phẩm của chúng tôi</div>
<br><br>
<?php
    connectDB();
    global $conn;
    $tv="select id,name,price,images from products where trang_chu='co' order by sap_xep_trang_chu desc limit 0,15";
    $tv_1=mysqli_query($conn,$tv);
    echo "<center><table>";
    while($tv_2=mysqli_fetch_array($tv_1))
    {
        echo "<tr>";
            for($i=1;$i<=3;$i++)
            {
                echo "<td align='center' width='215px' valign='top' >";
                    if($tv_2!=false)
                    {
                        $link_anh="../images/product_imags/".$tv_2['images'];
                        $link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$tv_2['id'];
                        $gia=$tv_2['price'];
                        $gia=number_format($gia,0,",",".");     
                        echo "<a href='$link_chi_tiet' >";
                            echo "<img src='$link_anh' width='150px' >";
                        echo "</a>";
                        echo "<br>";
                        echo "<a href='$link_chi_tiet' >";
                            echo $tv_2['name'];
                        echo "</a>";
                        echo "<br>";
                        echo $gia."đ";echo "<br>";echo "<br>";
                    }
                    else
                    {
                        echo "&nbsp;";
                    }
                echo "</td>";
                if($i!=3)
                {
                    $tv_2=mysqli_fetch_array($tv_1);
                }
            }
        echo "</tr>";
    }
    echo "</table></center>";
}
function footer(){
    connectDB();
    global $conn;
    $tv="select * from footer limit 0,1";
    $tv_1=mysqli_query($conn,$tv);
    $tv_2=mysqli_fetch_array($tv_1);
    echo $tv_2['html'];
}
function banner(){
    connectDB();
    global $conn;
    $tv="select * from banner limit 0,1";
    $tv_1=mysqli_query($conn,$tv);
    $tv_2=mysqli_fetch_array($tv_1);
    $link_hinh="../images/banner/".$tv_2['hinh'];  
    echo "<img src='".$link_hinh."' width='".$tv_2['rong']."' height='".$tv_2['cao']."' >";
}
function sanphamnoibat(){
    ?><br><br>
    <div style="margin-left: 15px; font-size: 20px">Sản phẩm nổi bật </div><br><br>
    <?php
        connectDB();
        global $conn;
        $tv="select id,name,images,price from products where noi_bat='co' order by id desc limit 0,3";
        $tv_1=mysqli_query($conn,$tv);
    echo "<center><table>";
    while($tv_2=mysqli_fetch_array($tv_1))
    {
        echo "<tr>";
            for($i=1;$i<=3;$i++)
            {
                echo "<td align='center' width='215px' valign='top' >";
                    if($tv_2!=false)
                    {
                        $link_anh="../images/product_imags/".$tv_2['images'];
                        $link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$tv_2['id'];
                        $gia=$tv_2['price'];
                        $gia=number_format($gia,0,",",".");
                        echo "<a href='$link_chi_tiet' >";
                            echo "<img src='$link_anh' width='150px' >";
                        echo "</a>";
                        echo "<br>";
                        echo "<a href='$link_chi_tiet' >";
                            echo $tv_2['name'];
                        echo "</a>";
                        echo "<br>";
                        echo $gia."đ";echo "<br>";echo "<br>";
                    }
                    else
                    {
                        echo "&nbsp;";
                    }
                echo "</td>";
                if($i!=3)
                {
                    $tv_2=mysqli_fetch_array($tv_1);
                }
            }
        echo "</tr>";
    }
    echo "</table></center>";
}
function dofunction(){
    if(isset($_GET['thamso'])){$tham_so=$_GET['thamso'];}else{$tham_so="";}
    switch($tham_so)
    {
        case "xuat_san_pham":
            showproducts();
        break;
        case "chi_tiet_san_pham";
            product_details();
        break;
        case "xuat_san_pham_2":
            showallproducts();
        break;
        case "xuat_mot_tin":
            shownews();
        break;
        case "tim_kiem":
            search();
        break;
        case "gio_hang";
            cart();
        break;
        default:
            slideshow(); 
            sanphamnoibat();
            sanphamtrangchu();
    }
}


?>

