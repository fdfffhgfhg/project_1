<p style="text-align: center;">Thêm bài viết</p>
<table border="1" width="100%" style="border-collapse: collapse">
    <form method="POST" action="modules/quanlybaiviet/xuly.php" enctype="multipart/form-data">
    <tr>
        <td style="text-align: center;">Tên bài viết</td>
        <td><input type="text" name="tensanpham" width="100%"></td>
    </tr>
    <tr>
        <td style="text-align: center;">Hình ảnh</td>
        <td><input type="file" name="hinhanh"></td>
    </tr>
    <tr>
        <td style="text-align: center;">Tóm tắt</td>
        <td><textarea rows="10" name="tomtat" style="resize: none;"></textarea></td>
    </tr>
    <tr>
        <td style="text-align: center;">Nội dung</td>
        <td><textarea rows="10" name="noidung" style="resize:none;"></textarea></td>
    </tr>
    <tr>
        <td>Danh mục bài viết</td>
        <td>
            <select name="danhmuc">
                <?php
                $sql_danhmuc = "SELECT * FROM tbl_danhmucbaiviet order by id_danhmuc_baiviet desc";
                $query_danhmuc = mysqli_query($mysqli , $sql_danhmuc);
                while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                ?>
                <option value="<?php echo $row_danhmuc['id_danhmuc_baiviet']?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></option>
                <?php
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">Tình trạng</td>
        <td>
            <select name = "tinhtrang">
                <option value="1">Kích hoạt</option>
                <option value="0">Ẩn</option>
            </select>
        </td>
    </tr>
    <tr>
        <td style="text-align: center;" colspan="2"><input type="submit" name="thembaiviet" value="Thêm bai viet"></td>
    </tr>
    </form>
</table>