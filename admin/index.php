<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/styleadmin.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <title>Trang quản lý</title>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    </head>

    <!--
    <?php
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header("Location:login.php");
    }
    ?>
    -->
    <body>
        <h3 class="title_adm">Trang quản lý dành cho admin</h3>
        <div class="wrapper">
        <?php
              include("config/connect.php");
              include("modules/header.php");
              include("modules/menu.php");
              include("modules/main.php");
              include("modules/footer.php");
        ?>
        </div>
        <script>
            CKEDITOR.replace( 'thongtinlienhe' );
			CKEDITOR.replace( 'tomtat' );
            CKEDITOR.replace( 'noidung' );
		</script>
        <script type="text/javascript">
            $(document).ready(function(){
                thongke();
                var char = new Morris.Area({
                  element: 'chart',
                  xkey: 'date',
                  ykeys: ['date','order','sales','quantity'],
                  labels: ['Ngay','Don hang','Doanh thu','So luong ban']
                });
                $('.select-date').change(function(){
                    var thoigian = $(this).val();
                    if(thoigian=='7ngay'){
                        var text = '7 ngay qua';
                    }else if(thoigian=='28ngay'){
                        var text = '28 ngay qua';
                    }
                    else if(thoigian=='90ngay'){
                        var text = '90 ngay qua';
                    }
                    else{
                        var text = '365 ngay qua';
                    }
                    $('#text-date').text(text);                                 
                    $.ajax({
                       url:"modules/thongke.php",
                       method:"POST",
                       dataType:"JSON",
                       data:{thoigian:thoigian},
                       success:function(data)
                       {
                        char.setData(data);
                        $('#text-date').text(text);
                       }
                    });
                    
                })
                function thongke(){
                    var text = '365 ngay qua';
                    $('#text-date').text(text);
                    $.ajax({
                       url:"modules/thongke.php",
                       method:"POST",
                       dataType:"JSON",
                       success:function(data)
                       {
                        char.setData(data);
                        $('#text-date').text(text);
                       }
                    });
                }
            }
        );
        
        </script>
    </body>
</html>