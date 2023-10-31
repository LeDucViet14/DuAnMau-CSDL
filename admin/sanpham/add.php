<div class="row2">
  <div class="row2 font_title">
  <h1>THÊM MỚI SẢN PHẨM</h1>
  </div>
  <div class="row2 form_content ">
  <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
    <div class="row2 mb10 form_content_container">
      <label> DANH MỤC </label> <br>
      <select name="iddm" id="">
        <?php
          foreach($listdanhmuc as $danhmuc){
            extract($danhmuc);
            echo '
                <option value="'.$id.'">'.$name.'</option>                          
            ';
          }
        ?>
      </select>
    </div>
    <div class="row2 mb10 form_content_container">
      <label> Tên SP </label> <br>
      <input type="text" name="tensp" placeholder="nhập vào tên sp">
    </div>
    <div class="row2 mb10">
      <label>Giá SP </label> <br>
      <input type="text" name="giasp" placeholder="nhập vào giá sp">
    </div>
    <div class="row2 mb10">
      <label> Hình ảnh </label> <br>
      <input type="file" name="hinh">
    </div>
    <div class="row2 mb10 form_content_container">
      <label> Mô tả </label> <br>
      <textarea name="mota" cols="30" rows="10"></textarea>
    </div>
    <div class="row mb10 ">
      <input class="mr20" name="themmoi" type="submit" value="THÊM MỚI">
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