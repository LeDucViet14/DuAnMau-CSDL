<?php
    include '../model/pdo.php';
    include '../model/danhmuc.php';
    include '../model/sanpham.php';
    include '../model/taikhoan.php';
    include '../model/binhluan.php';
    include '../model/thongke.php';
    include 'header.php';
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case "adddm":
                if(isset($_POST['themmoi']) && $_POST['themmoi'] ){
                    $tenloai = $_POST['tenloai'];
                    $ischeck = true;
                    $listdanhmuc = loadall_danhmuc();
                    foreach($listdanhmuc as $item){
                        extract($item);
                        // print_r($item);
                        // print_r($name);
                        if($tenloai == $name){
                            $ischeck = false;
                            $thongbao = "Tên danh mục đã có !";
                        }
                    }
                    if(empty(trim($tenloai)) ){
                        $ischeck = false;
                        $thongbao = "Không được bỏ trống";
                    }
                    if($ischeck){
                        add_danhmuc($tenloai);
                        header("location: index.php?act=listdm");
                    }
                    
                }
                include 'danhmuc/add.php';
                break;

            case "listdm":
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;

            case "xoadm":
                if(isset($_GET['id']) && $_GET['id'] > 0){
                    xoadm($_GET['id']);
                    header("location: index.php?act=listdm");
                }
                break;

            case "suadm":
                if(isset($_GET['id']) && $_GET['id'] > 0){
                    $danhmuc = load_one_dm($_GET['id']);                   
                }
                include 'danhmuc/update.php';
                break;

            case "updatedm":
                if(isset($_POST['update']) && $_POST['update']){
                    $tenloai = $_POST['tenloai'];
                    $id = $_POST['id'];
                    update_dm($id, $tenloai);
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;

                
            case 'listsp':
                if(isset($_POST["clickOK"]) && $_POST['clickOK']){
                    $keyw = $_POST['keyw'];
                    $iddm = $_POST['iddm'];
                }else{
                    $keyw = "";
                    $iddm = 0;
                }
                $listsanpham = loadall_sanpham($keyw, $iddm);
                $listdanhmuc = loadall_danhmuc();
                include 'sanpham/list.php';
                break;           

            case 'addsp':
                if(isset($_POST['themmoi']) && $_POST['themmoi']){
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = '../upload/'; // nơi lưu ảnh
                    $target_flie = $target_dir.basename($hinh);
                    if(move_uploaded_file($_FILES['hinh']['tmp_name'], $target_flie)){
                        // echo "upload ảnh thành công";
                    }else{
                        // echo "upload ảnh không thành công";
                    }

                    insert_sanpham($tensp, $giasp, $mota, $hinh, $iddm);
                    $thongbao = "Thêm thành công";
                    header("location: index.php?act=listsp");
                }
                $listdanhmuc = loadall_danhmuc();
                include 'sanpham/add.php';
                break;
            
            case "xoasp":
                if(isset($_GET['id']) && $_GET['id']>0) {
                    xoasp($_GET['id']);
                    header("location: index.php?act=listsp");
                }
                break;
            case "suasp":
                if(($_GET['idsp'] > 0) && (isset($_GET['idsp']))){
                    $sanpham = loadone_sanpham($_GET['idsp']);
                }
                $listdanhmuc = loadall_danhmuc();
                include 'sanpham/update.php';
                break;

            case "updatesp":
                if(isset($_POST['update']) && $_POST['update']){                   
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $id = $_POST['id'];
                    $mota = $_POST['mota'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_flie = $target_dir.basename($hinh);
                    update_sanpham($iddm, $tensp, $giasp, $mota, $hinh, $id);
                    if(move_uploaded_file($_FILES['hinh']['tmp_name'], $target_flie)){
                        // echo "upload ảnh thành công";
                    }else{
                        // echo "upload ảnh không thành công";
                    }                    
                }
                if(isset($_POST["clickOK"]) && $_POST['clickOK']){
                    $keyw = $_POST['keyw'];
                    $iddm = $_POST['iddm'];
                }else{
                    $keyw = "";
                    $iddm = 0;
                }
                $listsanpham = loadall_sanpham($keyw, $iddm);
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/list.php";
                break;

            case "listkh":
                $alluser = loadall_taikhoan();
                include "taikhoan/list.php";
                break;

            case "suatk":
                if(isset($_GET['id']) && $_GET['id']>0){
                    $taikhoan=loadone_taikhoan($_GET['id']);
                }
                include "taikhoan/update.php";
                break;

            case "updatetk":
                if(isset($_POST['update']) && $_POST['update']) {
                    $id = $_POST['id'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $role = $_POST['role'];
                    update_tk_role($id, $user, $pass, $email, $address, $tel, $role);
                    header("location: index.php?act=listkh");
                }
                break;

            case "xoatk":
                if(isset($_GET['id']) && $_GET['id'] > 0){
                    xoatk($_GET['id']);
                    header("location: index.php?act=listkh");
                }
                break;

            case "listbl":
                $listbl = loadall_binhluan();
                include "binhluan/list.php";
                break;

            // case "suabl":
            //     if(isset($_GET['id']) && $_GET['id'] > 0){
            //         $binhluan = loadone_binhluan($_GET['id']);
            //     }
            //     include "binhluan/update.php";
            //     break;

            // case "updatebl":
            //     if(isset($_POST['update']) && $_POST['update']){
            //         $id = $_POST['id'];
            //         $noidung = $_POST['noidung'];
            //         $iduser = $_POST['iduser'];
            //         $idpro = $_POST['idpro'];
            //         $ngaybinhluan = $_POST['ngaybinhluan'];
            //         update_binhluan($noidung, $iduser, $idpro, $ngaybinhluan, $id);
            //         header("location: index.php?act=listbl");
            //     }
            //     break;

            case "xoabl":
                if($_GET['id'] > 0 && (isset($_GET['id']))){
                    delete_binhluan($_GET['id']);
                    header("location: index.php?act=listbl");
                }
                break;

            case 'bieudo':
                $dsthongke = load_thongke_sanpham_danhmuc();
                include 'thongke/bieudo.php';
                break;
            case "thongke":
                $dsthongke = load_thongke_sanpham_danhmuc();
                include "thongke/list.php";
                break;
            
            case "bieudosp":
                $listsanpham = loadall_sanpham();
                include "sanpham/bieudo.php";
                break;
        }
    }else{
        include 'home.php';
    }
    include 'footer.php';
?>
        
    
