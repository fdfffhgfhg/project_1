
<?php
  $sql_bv = "SELECT * FROM tbl_baiviet
             where tinhtrang = 1
             order by id_baiviet desc";
  $query_bv = mysqli_query($mysqli,$sql_bv);
?>

<h3>Tin mới nhất</h3>
<div class="row">
    <?php while($row_bv = mysqli_fetch_array($query_bv)){
    ?>
    <div class="col-md-3 col-sm-12 col-xs-12">
        <a href="index.php?quanly=baiviet&id=<?php echo $row_bv['id_baiviet'] ?>">
            <img class="img img-responsive" width="100%" src="admin/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh']?>">
            <p class="title_product">Tiêu đề : <?php echo $row_bv['tenbaiviet']?></p>
        </a>
        <p class="title_product"><?php echo $row_bv['tomtat']?></p>
    </div>
    <?php
    }
    ?>
</div>