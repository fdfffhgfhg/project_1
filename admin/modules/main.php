<div class="clear">

</div>
<div class="main">
    <?php
    if(isset($_GET['action']) && $_GET['query']){
       $temp = $_GET['action'];
       $query = $_GET['query'];
    }else{
       $temp='';
       $query = '';
    }
    if($temp=='quanlydanhmucsanpham' && $query == 'them'){
       include("modules/quanlydanhmucsanpham/them.php");
       include("modules/quanlydanhmucsanpham/lietke.php");
    }
    elseif($temp=='quanlydanhmucsanpham' && $query == 'sua'){
      include("modules/quanlydanhmucsanpham/suathongtin.php");
    }
    elseif($temp=='quanlysp' && $query == 'them'){
      include("modules/quanlysanpham/themsp.php");
      include("modules/quanlysanpham/lietkesp.php");
    }
    elseif($temp=='quanlysp' && $query == 'sua'){
      include("modules/quanlysanpham/suathongtin.php");
    }
    elseif($temp=='quanlydonhang' && $query == 'lietke'){
      include("modules/quanlydonhang/lietkedonhang.php");
    }
    elseif($temp=='donhang' && $query == 'xemdonhang'){
      include("modules/quanlydonhang/xemdonhang.php");
    }
    elseif($temp=="quanlydanhmucbaiviet" && $query=="them"){
      include("modules/quanlydanhmucbaiviet/them.php");
      include("modules/quanlydanhmucbaiviet/lietke.php");
    }
    elseif($temp=="quanlydanhmucbaiviet" && $query=="sua"){
      include("modules/quanlydanhmucbaiviet/sua.php");
    }
    elseif($temp=="quanlybaiviet" && $query=="them"){
      include("modules/quanlybaiviet/them.php");
      include("modules/quanlybaiviet/lietke.php");
    }
    elseif($temp=="quanlybaiviet" && $query=="sua"){
      include("modules/quanlybaiviet/sua.php");
    }
    elseif($temp=="quanlylienhe" && $query=="capnhat"){
      include("modules/thongtinlienhe/quanly.php");
    }
    else{
        include("modules/dashboard.php");
    }
    ?>
</div>