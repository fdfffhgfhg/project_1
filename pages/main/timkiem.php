<?php
    if(isset($_POST['timkiem'])){
       $tukhoa = $_POST['tukhoa'];
    }else{
        $tukhoa = '';
    }
       $sql_pro = "SELECT * FROM tbl_sanpham,danhmuc
                  where tbl_sanpham.id_danhmuc = danhmuc.id_danhmuc
                  and tensanpham like '%".$tukhoa."%'; 
                  ";
       $query_pro = mysqli_query($mysqli,$sql_pro);
?>
<h3>Từ khóa tìm kiếm : <?php echo $_POST['tukhoa'] ?></h3>
<ul class="product_list">
    <?php
      while($row = mysqli_fetch_array($query_pro)){
    ?>
    <li>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
            <img src="admin/modules/quanlysanpham/uploads/<?php echo $row['hinhanh']?>">
            <p class="title_product">Tên sản phẩm : <?php echo $row['tensanpham']?></p>
            <p class="price_product">Giá : <?php echo number_format($row['giasanpham'],0,',','.').'vnd'?></p>
            <p class="cate_product" style="text-align: center;color : #d1d1d1"><?php echo $row['tendanhmuc']?></p>
        </a>
    </li>
    <?php
      }
    ?>
</ul>