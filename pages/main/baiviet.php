
<?php
  $sql_bv = "SELECT * FROM tbl_baiviet
   where tbl_baiviet.id_baiviet = '$_GET[id]'
     limit 1";
  $query_bv = mysqli_query($mysqli,$sql_bv);
  $query_bv_all = mysqli_query($mysqli,$sql_bv);
  $row_bv = mysqli_fetch_array($query_bv);
?>

<h3>Bài viết : <?php echo $row_bv['tenbaiviet']?> </h3>
<ul class="baiviet">
    <?php 
    while($row = mysqli_fetch_array($query_bv_all)){
    ?>
    <li>
      <h4><?php echo $row['tenbaiviet']?></h4>
      <img src="admin/modules/quanlybaiviet/uploads/<?php echo $row['hinhanh']?>">
      <p class="title_product"><?php echo $row['tomtat']?></p>
      <p style="margin:10px;" class="title_product"><?php echo $row['noidung']?></p>
    </li>
    <?php
    }
    ?>
   </ul>
