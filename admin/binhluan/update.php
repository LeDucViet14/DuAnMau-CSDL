<?php
    if(is_array($binhluan)){
        extract($binhluan);
    }
?>

<div class="row2">
    <div class="row2 font_title">
        <h1>Sửa bình luận</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=updatebl" method="POST">
            <div class="row2 mb10 form_content_container">
                <label> Mã loại </label> <br>
                <input type="text" name="maloai" disabled>
            </div>
            <div class="row2 mb10">
                <label>Nội dung </label> <br>
                <input type="text" name="noidung" value="<?=$noidung?>">
            </div>
            <div class="row2 mb10">
                <label>id user </label> <br>
                <input type="text" name="iduser" value="<?=$iduser?>">
            </div>
            <div class="row2 mb10">
                <label>id sản phẩm </label> <br>
                <input type="text" name="idpro" value="<?=$idpro?>">
            </div>
            <div class="row2 mb10">
                <label>Ngày bình luận </label> <br>
                <input type="text" name="ngaybinhluan" value="<?=$ngaybinhluan?>">
            </div>
            <div class="row mb10 ">
                <input type="hidden" name="id" value="<?=$id?>">
                <input class="mr20" type="submit" name = "update" value="UPDATE">
                <input  class="mr20" type="reset" value="NHẬP LẠI">

            <a href="index.php?act=listbl"><input  class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
        </form>
    </div>
</div>