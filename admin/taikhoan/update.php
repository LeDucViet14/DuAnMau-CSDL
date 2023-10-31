<?php
    if(is_array($taikhoan)){
        extract($taikhoan);
    }
?>
<div class="row2">
  <div class="row2 font_title">
  <h1>SỬA THÔNG TIN TÀI KHOẢN</h1>
  </div>
  <div class="row2 form_content ">
  <form action="index.php?act=updatetk" method="POST" enctype="multipart/form-data">
    <div class="row2 mb10 form_content_container">
    </div>
    <div class="row2 mb10 form_content_container">
      <label> USER </label> <br>
      <input type="text" name="user" value="<?=$user?>">
    </div>
    <div class="row2 mb10">
      <label>PASS </label> <br>
      <input type="text" name="pass" value="<?=$pass?>">
    </div>
    <div class="row2 mb10">
      <label> EMAIL </label> <br>
      <input type="text" name="email" value="<?=$email?>">
    </div>
    <div class="row2 mb10 form_content_container">
      <label> ADDRESS </label> <br>
      <input type="text" name="address" value="<?=$address?>">
    </div>
    <div class="row2 mb10 form_content_container">
      <label> TEL </label> <br>
      <input type="text" name="tel" value="<?=$tel?>">
    </div>
    <div class="row2 mb10 form_content_container">
      <label> VAI TRÒ </label> <br>
      <input type="text" name="role" value="<?=$role?>">
    </div>
    <div class="row mb10 ">
      <input type="hidden" name ="id" value="<?=$id?>">
      <input class="mr20" name="update" type="submit" value="UPDATE">
      <input  class="mr20" type="reset" value="NHẬP LẠI">
      <a href="index.php?act=listkh"><input  class="mr20" type="button" value="DANH SÁCH"></a>
    </div>
    <?php
      if(isset($thongbao) && $thongbao != ""){
        echo '<h2>'.$thongbao.'</h2>';
      }
    ?>
  </form>
  </div>
</div>