
    <h4 style="text-align:center;">Danh mục sản phẩm</h4>
    <ul class="list_sidebar">
        <?php
          $sql_danhmuc = "SELECT * from danhmuc order by id_danhmuc desc";
          $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
          while($row = mysqli_fetch_array($query_danhmuc)){
        ?>
        <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc']?>" style="text-align:center"> <?php echo $row['tendanhmuc'] ?> </a></li>
        <?php
        }
        ?>
    </ul>
    <h4 style="text-align:center;">Danh mục tin tức</h4>
    <ul class="list_sidebar">
        <?php
          $sql_danhmuc_bv = "SELECT * from tbl_danhmucbaiviet order by id_danhmuc_baiviet desc";
          $query_danhmuc_bv = mysqli_query($mysqli,$sql_danhmuc_bv);
          while($row = mysqli_fetch_array($query_danhmuc_bv)){
        ?>
        <li><a href="index.php?quanly=danhmucbaiviet&id=<?php echo $row['id_danhmuc_baiviet']?>" style="text-align:center"> <?php echo $row['tendanhmuc_baiviet'] ?> </a></li>
        <?php
        }
        ?>
    </ul>

    
