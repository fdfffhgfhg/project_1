<p style="text-align: center;">Thêm sản phẩm</p>
<table border="1" width="100%" style="border-collapse: collapse">
    <form method="POST" action="modules/quanlysanpham/xulydulieu.php" enctype="multipart/form-data">
    <tr>
        <td style="text-align: center;">Tên sản phẩm</td>
        <td><input type="text" name="tensanpham" width="100%"></td>
    </tr>
    <tr>
        <td style="text-align: center;">Mã sản phẩm</td>
        <td><input type="text" name="masanpham" width="100%"></td>
    </tr>
    <tr>
        <td style="text-align: center;">Giá sản phẩm</td>
        <td><input type="text" name="giasp" width="100%"></td>
    </tr>
    <tr>
        <td style="text-align: center;">Số lượng</td>
        <td><input type="text" name="soluong" width="100%"></td>
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
        <td>Danh mục sản phẩm</td>
        <td>
            <select name="danhmuc">
                <?php
                $sql_danhmuc = "SELECT * FROM danhmuc order by id_danhmuc desc";
                $query_danhmuc = mysqli_query($mysqli , $sql_danhmuc);
                while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                ?>
                <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
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
        <td style="text-align: center;" colspan="2"><input type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
    </tr>
    </form>
</table>