<main class="catalog  mb ">

    <div class="boxleft">

      <div class="box_title">Cập nhật thành viên</div>
      <div class="box_content form_account">
        <?php
            if(isset($_SESSION['user']) && is_array($_SESSION['user'])){
                extract($_SESSION['user']);
            }
        ?>
        <form action="index.php?act=edit_taikhoan" method="post">
          <div>
            <p>Email</p>
            <input type="email" name="email" placeholder="email" value="<?=$email?>">
          </div>

          <div>
            Tên đăng nhập
            <input type="text" name="user"  placeholder="user" value="<?=$user?>">
          </div>
          
          <div>
            Mật khẩu
            <input type="password" name="pass"  placeholder="pass" value="<?=$pass?>">
          </div>
          
          <div>
            Địa chỉ
            <input type="text" name="address"  placeholder="address" value="<?=$address?>">
          </div>

          <div>
            Điện thoại
            <input type="text" name="tel"  placeholder="tel" value="<?=$tel?>">
          </div>
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="submit" value="Cập nhật" name="capnhat">
            <input type="reset" value="Nhập lại">
        </form>
        <?php
            if(isset($thongbao) && $thongbao != ""){
                echo $thongbao;
            }
        ?>
      </div>

    </div>
    <?php include 'view/boxright.php' ?>
  </main>