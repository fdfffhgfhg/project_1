<?php
   $sql_danhmuc = "SELECT * FROM danhmuc order by id_danhmuc desc";
   $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
?>
<?php
   if(isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1){
    unset($_SESSION['dangky']);
   }
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="width:100%">
  <a class="navbar-brand" href="index.php">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Trang chủ<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?quanly=giohang">Giỏ hàng</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
           Danh mục sản phẩm
        </a>
        <div class="dropdown-menu">
        <?php while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
        ?> 
          <a class="dropdown-item" href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></a>
         <?php
        }
        ?>
      </li>
      <?php
        if(isset($_SESSION['dangky'])){
        ?>
        <li class="nav-item"><a class="nav-link" href="index.php?dangxuat=1" target="_self">Đăng xuất</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?quanly=thaydoimatkhau" target="_self">Đổi mật khẩu</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?quanly=lichsudonhang" target="_self">Lịch sử đơn hàng</a></li>
        <?php
        }else{
        ?>
        <li class="nav-item"><a class="nav-link" href="index.php?quanly=dangky" target="_self">Đăng ký</a></li>
        <?php
        }
        ?>
        <li class="nav-item"><a class="nav-link" href="index.php?quanly=tintuc" target="_self">Tin tức</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?quanly=lienhe" target="_self">Liên hệ</a></li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="index.php?quanly=timkiem" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Từ khóa" name="tukhoa" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0"  type="submit" name="timkiem">Tìm kiếm</button>
    </form>
  </div>
</nav>
