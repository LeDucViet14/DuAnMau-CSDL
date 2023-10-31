<?php
  session_start();
  include "model/pdo.php";
  include "model/sanpham.php";
  include "global.php";
  include 'model/danhmuc.php';
  include 'model/binhluan.php';
  include 'model/taikhoan.php';
  include 'view/header.php';
  $spnew = loadall_sanpham_home();
  $dsdm = loadall_danhmuc();
  $dstop10 = loadall_sanpham_top10();
  if(isset($_GET['act']) && ($_GET['act'] != "")){
    $act = $_GET['act'];
    switch ($act){
      case "sanpham":
        if(isset($_POST['keyword']) && $_POST['keyword'] != 0){
          $kyw = $_POST['keyword'];
        }else{
          $kyw = "";
        }

        if(isset($_GET['iddm']) && $_GET['iddm'] > 0){
          $iddm = $_GET['iddm'];
        }else{
          $iddm = 0;
        }
        $dssp = loadall_sanpham($kyw,$iddm);
        $tendm = load_ten_dm($iddm);
        include 'view/sanpham.php';
        break;

      case "sanphamct" :
        if(isset($_POST['guibinhluan'])){
          if(empty($_POST['noidung'])){
            $thongbao = "không được bỏ chống";
          }else{
            insert_binhluan($_POST['idpro'], $_POST['noidung'], $_SESSION['user']['id']);
          }
          
        }
        if(isset($_GET['idsp']) && $_GET['idsp'] > 0){
          $sp = loadone_sanpham($_GET['idsp']);
          $sp_cungloai = loadsp_cungloai($_GET['idsp'], $sp['iddm']);
          $binhluan = load_binhluan($_GET['idsp']);
          include 'view/chitietsanpham.php';
        }
        break;

      case "dangky":
        if(isset($_POST['dangky'])){
          $email = $_POST['email'];
          $pass = $_POST['pass'];
          $user = $_POST['user'];
          insert_taikhoan($email, $user, $pass);
          $thongbao = "Dang ky thanh cong";
        }
        include "view/login/dangky.php";
        break;

      case "dangnhap":
        if(isset($_POST['dangnhap'])) {
          $checkuser = dangnhap($_POST['user'], $_POST['pass']);
          if(is_array($checkuser)){
            $_SESSION['user'] = $checkuser;
            $thongbao="Bạn đã đăng nhập thành công";
          }else{
            $thongbao="Tài khoản không tồn tại !";
          }
          include 'view/home.php';
        }
        break;

      case "dangxuat":
        dangxuat();
        include 'view/home.php';
        break;

      case "quenmk":
        if(isset($_POST['guiemail'])){
          $email = $_POST['email'];
          $sendMailMess = sendMail($email);
        }
        include "view/login/quenmk.php";
        break;
      
      case "edit_taikhoan":
        if(isset($_POST['capnhat']) && $_POST['capnhat']){
          $email = $_POST['email'];
          $pass = $_POST['pass'];
          $user = $_POST['user'];
          $address = $_POST['address'];
          $tel = $_POST['tel'];
          $id = $_POST['id'];
          $tknew = update_taikhoan($id, $user, $pass, $email, $address, $tel);
          $_SESSION['user'] = $tknew;
          $thongbao = "Cập nhật thành công";
        }
        include "view/login/edit_taikhoan.php";
        break;
      

    }

  }else{
    include 'view/home.php';
  }

  include 'view/footer.php';
?>
            
            
            