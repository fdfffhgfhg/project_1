<?php
    $sql_sua_bv = "SELECT * FROM tbl_baiviet 
                   WHERE id_baiviet = '$_GET[idbaiviet]'
                    LIMIT 1";
    $query_sua_bv= mysqli_query($mysqli,$sql_sua_bv);
?>
<p>Sửa thông tin bài viết</p>
<table border="1" width="100%" style="border-collapse: collapse">
    <?php     
    while($row = mysqli_fetch_array($query_sua_bv)){
    ?>
    <form method="POST" action="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet']?>" enctype="multipart/form-data">
    <tr>
        <td style="text-align: center;">Tên bài viết</td>
        <td><input type="text" value="<?php echo $row['tenbaiviet'] ?>" name="tenbaiviet" width="100%"></td>
    </tr>
    <tr>
        <td style="text-align: center;">Hình ảnh</td>
        <td><input type="file" name="hinhanh">
        <img src = "modules/quanlybaiviet/uploads/<?php echo $row['hinhanh']?>" width = "150px">
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
        <td>Danh mục bài viết</td>
        <td>
            <select name="danhmuc">
                <?php
                $sql_danhmuc = "SELECT * FROM tbl_danhmucbaiviet order by id_danhmuc_baiviet desc";
                $query_danhmuc = mysqli_query($mysqli , $sql_danhmuc);
                while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                   if($row_danhmuc['id_danhmuc_baiviet'] == $row['id_danhmuc_baiviet']){
                ?>
                <option selected value="<?php echo $row_danhmuc['id_danhmuc_baiviet']?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></option>
                <?php
                   }else{
                ?>
                <option value="<?php echo $row_danhmuc['id_danhmuc_baiviet']?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></option>
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
        <td style="text-align: center;" colspan="2"><input type="submit" name="suabaiviet" value="Sua thong tin bai viet"></td>
    </tr>
    </form>
    <?php
    }
    ?>
</table>