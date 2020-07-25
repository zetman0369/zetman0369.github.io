<?php
    if(!isset($bien_bao_mat)){exit();}
?>
<?php
    function trang_truoc_html()
    {
        ?>
            <html><head>
              <meta charset="UTF-8">
              <title>Đang chuyển về trang trước</title></head>
            <body>
                <script type="text/javascript">
                    window.history.back();
                </script>  
            </body>
            </html>
        <?php
    }
?>