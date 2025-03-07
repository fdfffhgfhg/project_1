<p>Quản lý thông tin website </p>
<?php
   $sql_lh = "SELECT * from tbl_lienhe where id=1";
   $query_lh = mysqli_query($mysqli,$sql_lh);
?>
<table border="1" width="100%" style="border-collapse: collapse">
    <?php
    while($row = mysqli_fetch_array($query_lh)){
    ?>
    <form method="POST" action="modules/thongtinlienhe/xuly.php?id=<?php echo $row['id']?>" enctype="multipart/form-data">
         <tr>
            <td>Thông tin liên hệ</td>
            <td><textarea rows="10" name="thongtinlienhe" style="resize: none;"><?php echo $row['thongtinlienhe']?></textarea></td>

         </tr>
         <tr>
            <td colspan="2"><input type="submit" name="capnhatlienhe" value="Cap nhat"></td>
         </tr>
    </form>
    <?php
    }
    ?>
</table>