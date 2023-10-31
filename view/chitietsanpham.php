<style>
  td{
    padding: 0 20px;
  }
</style>

<main class="catalog  mb ">
    <div class="boxleft">
      <?php
        extract($sp);
        $img = $img_path.$img;
      ?>
      <div class="mb">
        <div class="box_title"><?=$name?></div>
        <div class="box_content">
          <img src="<?=$img?>" width="300">
          <?php echo "<p>$mota</p>" ?>
        </div>
      </div>

      <div class="mb">
        <div class="box_title">BÌNH LUẬN</div>
        <div class="box_content2  product_portfolio binhluan ">
          <table>
            <tr>
              <td>Nội dung</td>
              <td>Người bình luận</td>
              <td>Ngày bình luận</td>
            </tr>
            <?php
              foreach($binhluan as $value){
                extract($value);
                // echo "<pre>";
                // print_r($value);
                echo'
                <tr>
                  <td>'.$noidung.'</td>
                  <td>'.$user.'</td>
                  <td>'.date("d/m/Y", strtotime($ngaybinhluan)).'</td>
                </tr>
                ';
              }
            ?>
            <!-- <tr>
              <td>Sản phẩm quá đẹp</td>
              <td>Nguyễn Thành A</td>
              <td>20/10/2022</td>
            </tr> -->
          </table>
        </div>
        <?php
          if(isset($_SESSION['user'])) {
        ?>
        <div class="box_search">
          <form action="index.php?act=sanphamct&idsp=<?=$id?>" method="POST">
            <input type="hidden" name="idpro" value="<?=$id ?>">
            <input type="text" name="noidung">
            <input type="submit" name="guibinhluan" value="Gửi bình luận"><br>
            <?php
              if(isset($thongbao) && $thongbao != ""){
                echo $thongbao;
              }
            ?>
          </form>
        </div>
        <?php
          }else{
            echo '<p style="color:red">Đăng nhập để bình luận</p>';
          }
        ?>
        // d

        
          
       
      </div>

      <div class=" mb">
        <div class="box_title">SẢN PHẨM CÙNG LOẠI</div>
        <div class="box_content">
          <?php
            foreach($sp_cungloai as $value){
              $link = "index.php?act=sanphamct&idsp=$id";
              // print_r($value['name']);
              extract($value);
              echo '<li><a href="'.$link.'">'.$name.'</a></li>';
            }
          ?>
        </div>
      </div>
    </div>
    <?php include 'boxright.php'; ?>
  </main>
  <!-- BANNER 2 -->