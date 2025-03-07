<?php
    $sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
    $query_sua_sp= mysqli_query($mysqli,$sql_sua_sp);
?>
<p>Sửa thông tin sản phẩm</p>
<table border="1" width="100%" style="border-collapse: collapse">
    <?php     
    while($row = mysqli_fetch_array($query_sua_sp)){
    ?>
    <form method="POST" action="modules/quanlysanpham/xulydulieu.php?idsanpham=<?php echo $row['id_sanpham']?>" enctype="multipart/form-data">
    <tr>
        <td style="text-align: center;">Tên sản phẩm</td>
        <td><input type="text" value="<?php echo $row['tensanpham'] ?>" name="tensanpham" width="100%"></td>
    </tr>
    <tr>
        <td style="text-align: center;">Mã sản phẩm</td>
        <td><input type="text" value="<?php echo $row['masanpham'] ?>" name="masanpham" width="100%"></td>
    </tr>
    <tr>
        <td style="text-align: center;">Giá sản phẩm</td>
        <td><input type="text" value="<?php echo $row['giasanpham'] ?>" name="giasp" width="100%"></td>
    </tr>
    <tr>
        <td style="text-align: center;">Số lượng</td>
        <td><input type="text" value="<?php echo $row['soluong'] ?>" name="soluong" width="100%"></td>
    </tr>
    <tr>
        <td style="text-align: center;">Hình ảnh</td>
        <td><input type="file" name="hinhanh">
        <img src = "modules/quanlysanpham/uploads/<?php echo $row['hinhanh']?>" width = "150px">
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">Tóm tắt</td>
        <td><textarea rows="10" name="tomtat" style="resize: none;"><?php echo $row['tomtat']?></textarea></td>
    </tr>
    <tr>
        <td style="text-align: center;">Nội dung</td>
        <td><textarea rows="10" name="noidung" style="resize:none;"><?php echo $row['noidung']?></textarea></td>
    </tr>
    <tr>
        <td>Danh mục sản phẩm</td>
        <td>
            <select name="danhmuc">
                <?php
                $sql_danhmuc = "SELECT * FROM danhmuc order by id_danhmuc desc";
                $query_danhmuc = mysqli_query($mysqli , $sql_danhmuc);
                while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                   if($row_danhmuc['id_danhmuc'] == $row['id_danhmuc']){
                ?>
                <option selected value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                <?php
                   }else{
                ?>
                <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                <?php
                   }
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">Tình trạng</td>
        <td>
            <select name = "tinhtrang">
                <?php
                if($row['tinhtrang'] == 1){
                ?>
                <option value="1" selected>Kích hoạt</option>
                <option value="0">Ẩn</option>
                <?php
                }else{
                ?>
                <option value="1">Kích hoạt</option>
                <option value="0" selected>Ẩn</option>
                <?php
                }
                ?>

            </select>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;" colspan="2"><input type="submit" name="suasanpham" value="Sua san pham"></td>
    </tr>
    </form>
    <?php
    }
    ?>
</table>