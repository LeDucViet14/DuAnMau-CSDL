<?php
    if(is_array($danhmuc)){
        extract($danhmuc);
    }
?>

<div class="row2">
    <div class="row2 font_title">
        <h1>Sửa danh mục</h1>
    </div>
    <div class="row2 form_content">
        <form action="index.php?act=updatedm" method="POST">
            <div class="row2 mb10 form_content_container">
                <label> Mã loại </label> <br>
                <input type="text" name="maloai" disabled>
            </div>
            <div class="row2 mb10">
                <label>Tên loại </label> <br>
                <input type="text" name="tenloai" value="<?=$name?>">
                <?php
                    // if(isset($thongbao) && $thongbao != ""){
                    //     echo $thongbao;
                    // }
                ?>
            </div>
            <div class="row mb10 ">
                <input type="hidden" name="id" value="<?=$id?>">
                <input class="mr20" type="submit" name = "update" value="UPDATE">
                <input  class="mr20" type="reset" value="NHẬP LẠI">

            <a href="index.php?act=listdm"><input  class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
        </form>
    </div>
</div>