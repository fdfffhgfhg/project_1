<?php
       if(isset($_GET['trang'])){
        $page = $_GET['trang'];
       }else{
        $page = 1;
       }
       if($page == '' || $page == 1){
        $begin = 0;
       }
       else{
        $begin = $page * 5 - 5;
       }
       $sql_pro = "SELECT * FROM tbl_sanpham,danhmuc
                  where tbl_sanpham.id_danhmuc = danhmuc.id_danhmuc
                order by tbl_sanpham.id_sanpham desc limit $begin,5";
       $query_pro = mysqli_query($mysqli,$sql_pro);
?>
<h3>Sản phẩm mới nhất</h3>
<div class="row">
    <?php
      while($row = mysqli_fetch_array($query_pro)){
        if($row['tinhtrang'] == 1){
    ?>
    
    <div class="col-md-2">
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
            <img class="img img-responsive" width="100%" src="admin/modules/quanlysanpham/uploads/<?php echo $row['hinhanh']?>">
            <p class="title_product">Tên sản phẩm : <?php echo $row['tensanpham']?></p>
            <p class="price_product">Giá : <?php echo number_format($row['giasanpham'],0,',','.').'vnd'?></p>
            <p class="cate_product" style="text-align: center;color : #d1d1d1"><?php echo $row['tendanhmuc']?></p>
        </a>
    </div>
    <?php
      }
    }
    ?>
</div>
<div style="clear:both;"></div>
<style type="text/css">
    ul.list_trang{
      padding : 0;
      margin : 0;
      list-style: none;
    }
    ul.list_trang li{
      float : left;
      padding : 5px;
      margin : 5px;
      background-color: lightskyblue;
      display : block;
    }
    ul.list_trang li a{
      color : black;
      text-align: center;
      text-decoration: none;
      padding : 5px;
    }
</style>
<?php
    $sql_trang = mysqli_query($mysqli,"select * from tbl_sanpham");
    $row_count = mysqli_num_rows($sql_trang);
    $trang = min(ceil($row_count / 5),5);
?>
<p>Trang : <?php echo $page ?>/<?php echo $trang?></p>
<ul class="list_trang">
  <?php
  for($i = 1 ; $i <= $trang ; $i ++){
   ?>
    <li <?php if($i == $page){echo 'style="background:red;"';}else{echo '';}?>>
      <a href="index.php?trang=<?php echo $i?>"><?php echo $i ?></a>
    </li>
    <?php
  }
  ?>
</ul>