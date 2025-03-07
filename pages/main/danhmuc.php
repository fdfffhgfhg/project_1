<?php
  $sql_pro = "SELECT * FROM tbl_sanpham
   where tbl_sanpham.id_danhmuc = '$_GET[id]'
     order by tbl_sanpham.id_sanpham desc";
  $query_pro = mysqli_query($mysqli,$sql_pro);
  // lấy tên danh mục
  $sql_cate = "SELECT * from danhmuc where danhmuc.id_danhmuc = '$_GET[id]' limit 1";
  $query_cate = mysqli_query($mysqli,$sql_cate);
  $row_cate = mysqli_fetch_array($query_cate);
?>

<h3>Danh mục sản phẩm : <?php echo $row_cate['tendanhmuc']?> </h3>
<div class="row">
    <?php
      while($row = mysqli_fetch_array($query_pro)){
    ?>
    <div class="col-md-3 col-sm-12 col-xs-12">
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
            <img class="img img-responsive" width="100%" height="200px" src="admin/modules/quanlysanpham/uploads/<?php echo $row['hinhanh']?>">
            <p class="title_product">Tên sản phẩm : <?php echo $row['tensanpham']?></p>
            <p class="price_product">Giá : <?php echo number_format($row['giasanpham'],0,',','.').'vnd'?></p>
            <p class="cate_product" style="text-align: center;color : #d1d1d1"><?php echo $row_cate['tendanhmuc']?></p>
        </a>
    </div>
    <?php
      }
    ?>
</div>