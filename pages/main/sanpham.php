<p> Chi tiết sản phẩm </p>
<?php
    $sql_chitiet = "SELECT * FROM tbl_sanpham,danhmuc
                    where tbl_sanpham.id_danhmuc = danhmuc.id_danhmuc
                    and tbl_sanpham.id_sanpham = '$_GET[id]'
                    limit 1 ";
    $query_chitiet = mysqli_query($mysqli,$sql_chitiet);
    while($row_chitiet = mysqli_fetch_array($query_chitiet)){  
?>
<div class = "wrapper_chitiet" style="border : 1px solid black;
                                      height : auto;
                                      width : 90%; 
                                      margin : 0 auto;">
<div class="hinhanhsanpham" style="float : left; 
                                   width : 30%;
                                   height : 195px;">
    <img width="100%" height="250px" src="admin/modules/quanlysanpham/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
</div>
<form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham']?>">
<div class="chitietsanpham" style="float : left;
                                   width : 49%;
                                   margin : 0 30px;">
     <h3 style="margin : 0">Tên sản phẩm : <?php echo $row_chitiet['tensanpham'] ?></h3>
     <p>Mã sản phẩm :  <?php echo $row_chitiet['masanpham']?></p>
     <p>Giá sản phẩm :  <?php echo number_format($row_chitiet['giasanpham'],0,',','.').'vnd'?></p>
     <p>Số lượng sản phẩm : <?php echo $row_chitiet['soluong']?></p>
     <p>Danh mục sản phẩm: <?php echo $row_chitiet['tendanhmuc'] ?></p>
     <p>
     <input class="themgiohang" name="themgiohang" type="submit" value="Thêm giỏ hàng"
        style = "border : none;
                background-color : aqua;
                padding : 12px;
                font-size : 15px;
                color:white ;
                cursor : pointer;">
     </p>
</div>
</form>
</div>
<div class="clear"></div>
<div class="tabs">
  <ul id="tabs-nav">
    <li><a href="#tab1">Thông số kỹ thuật</a></li>
    <li><a href="#tab2">Nội dung chi tiết</a></li>
    <li><a href="#tab3">Hình ảnh sản phẩm</a></li>
  </ul> <!-- END tabs-nav -->
  <div id="tabs-content">
    <div id="tab1" class="tab-content">
       <p><?php echo $row_chitiet['tomtat']?></p>
    </div>
    <div id="tab2" class="tab-content">
       <p><?php echo $row_chitiet['noidung']?></p>
    </div>
    <div id="tab3" class="tab-content">
    <img width="50%" src="admin/modules/quanlysanpham/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
    </div>
  </div> <!-- END tabs-content -->
</div> <!-- END tabs -->
<?php
    }
?>