<?php
    if(is_array($sanpham)){
        extract($sanpham);
    }
    $hinhpath= "../upload/".$img;
    if(is_file($hinhpath)){
        $hinhpath='<img src="'.$hinhpath.'" alt="" style="width:100px; height:100px">';
    }else{
        $hinhpath = "lỗi cmnr";
    }
?>
<div class="row2">
  <div class="row2 font_title">
  <h1>SỬA THÔNG TIN SẢN PHẨM</h1>
  </div>
  <div class="row2 form_content ">
  <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
    <div class="row2 mb10 form_content_container">
      <label> DANH MỤC </label> <br>
      <select name="iddm" id="">
        <!-- <option value="0" selected>Tất cả</option> -->
        <?php
          foreach($listdanhmuc as $danhmuc){
            // if($iddm==$danhmuc['id']){
            //     echo '<option value="'.$danhmuc['id'].'" selected >'.$danhmuc['name'].'</option>';
            // }else{
            //     echo '<option value="'.$danhmuc['id'].'">'.$danhmuc['name'].'</option>';
            // }
            echo '<option '.($iddm ? ($iddm==$danhmuc['id'] ? "selected" :"") : "").' value="'.$danhmuc['id'].'">'.$danhmuc['name'].'</option>';
          }
        ?>
      </select>
    </div>
    <div class="row2 mb10 form_content_container">
      <label> Tên SP </label> <br>
      <input type="text" name="tensp" value="<?=$name?>">
    </div>
    <div class="row2 mb10">
      <label>Giá SP </label> <br>
      <input type="text" name="giasp" value="<?=$price?>">
    </div>
    <div class="row2 mb10">
      <label> Hình ảnh </label> <br>
      <input type="file" name="hinh" value="<?=$hinhpath?>">
      <?php echo $hinhpath?>
    </div>
    <div class="row2 mb10 form_content_container">
      <label> Mô tả </label> <br>
      <textarea name="mota" cols="30" rows="10"><?=$mota?></textarea>
    </div>
    <div class="row mb10 ">
      <input type="hidden" name ="id" value="<?=$id?>">
      <input class="mr20" name="update" type="submit" value="UPDATE">
      <input  class="mr20" type="reset" value="NHẬP LẠI">
      <a href="index.php?act=listsp"><input  class="mr20" type="button" value="DANH SÁCH"></a>
    </div>
    <?php
      if(isset($thongbao) && $thongbao != ""){
        echo '<h2>'.$thongbao.'</h2>';
      }
    ?>
  </form>
  </div>
</div>