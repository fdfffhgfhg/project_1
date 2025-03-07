
<?php
  $sql_bv = "SELECT * FROM tbl_baiviet
   where tbl_baiviet.id_danhmuc_baiviet = '$_GET[id]'
     order by id_baiviet desc";
  $query_bv = mysqli_query($mysqli,$sql_bv);
  // lấy tên danh mục
  $sql_cate = "SELECT * from tbl_danhmucbaiviet where tbl_danhmucbaiviet.id_danhmuc_baiviet = '$_GET[id]' limit 1";
  $query_cate = mysqli_query($mysqli,$sql_cate);
  $row_cate = mysqli_fetch_array($query_cate);
?>

<h3>Danh mục bài viết : <?php echo $row_cate['tendanhmuc_baiviet']?> </h3>

    <?php while($row_bv = mysqli_fetch_array($query_bv)){
    ?>
    <div class="col-md-3 col-sm-12 col-xs-12">
        <a href="index.php?quanly=baiviet&id=<?php echo $row_bv['id_baiviet'] ?>">
            <img class="img img-responsive" src="admin/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh']?>">
            <p class="title_product">Tiêu đề : <?php echo $row_bv['tenbaiviet']?></p>
        </a>
        <p class="title_product"><?php echo $row_bv['tomtat']?></p>
    </div>
    <?php
    }
    ?>
