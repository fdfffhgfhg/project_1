
<div class="main">
    <div class="row">
       <!--lg: large    md : medium  sm : small xs: a bit bigger small-->
       <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
       <?php
       include("sidebar/sidebar.php");
       ?>
       </div>
   <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">  
    <div class="maincontent">
         <?php
         if(isset($_GET['quanly'])){
            $temp = $_GET['quanly'];
         }else{
            $temp='';
         }
         if($temp=='danhmucsanpham'){
            include("main/danhmuc.php");
         }
         elseif($temp=='giohang'){
            include("main/giohang.php");
         }
         elseif($temp=='danhmucbaiviet'){
            include("main/danhmucbaiviet.php");
         }
         elseif($temp=='baiviet'){
            include("main/baiviet.php");
         }
         elseif($temp=='tintuc'){
            include("main/tintuc.php");
         }
         elseif($temp=='lienhe'){
            include("main/lienhe.php");
         }
         elseif($temp=='sanpham'){
            include("main/sanpham.php");
         }
         elseif($temp=='dangky'){
            include("main/dangky.php");
         }
         elseif($temp=='thanhtoan'){
            include("main/thanhtoan.php");
         }
         elseif($temp=='dangnhap'){
            include("main/dangnhap.php");
         }
         elseif($temp=='timkiem'){
            include("main/timkiem.php");
         }
         elseif($temp=='camon'){
            include("main/camon.php");
         }
         elseif($temp=='thaydoimatkhau'){
            include("main/thaydoimatkhau.php");
         }
         elseif($temp=='vanchuyen'){
            include("main/vanchuyen.php");
         }
         elseif($temp=='thongtinthanhtoan'){
            include("main/thongtinthanhtoan.php");
         }
         elseif($temp=='donhangdadat'){
            include("main/donhangdadat.php");
         }
         elseif($temp=='lichsudonhang'){
            include("main/lichsudonhang.php");
         }
         elseif($temp=='xemdonhang'){
            include("main/xemdonhang.php");
         }
         else{
            include("main/index.php");
         }
         ?>
     </div>
    </div>
   </div>
</div>