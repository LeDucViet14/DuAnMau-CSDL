<?php
    function load_binhluan($idsp) {
        $sql = "SELECT binhluan.noidung, binhluan.ngaybinhluan, taikhoan.user, binhluan.iduser 
        FROM duanmau2023.binhluan
        INNER JOIN duanmau2023.taikhoan ON binhluan.iduser = taikhoan.id 
        INNER JOIN duanmau2023.sanpham ON binhluan.idpro = sanpham.id 
        WHERE sanpham.id = $idsp";
        $result = pdo_query($sql);
        return $result;

    }

    function insert_binhluan($idpro, $noidung, $iduser) {
        $date = date('Y-m-d');
        $sql = "INSERT INTO duanmau2023.binhluan (`noidung`, `iduser`, `idpro`, `ngaybinhluan`) 
                VALUES ('$noidung', '$iduser', '$idpro', '$date')";
        pdo_execute($sql);
    }

    function loadall_binhluan() {
        $sql = "SELECT `id`, `noidung`, `iduser`, `idpro`, `ngaybinhluan` FROM `binhluan` WHERE 1";
        $result = pdo_query($sql);
        return $result;
    }
    function loadone_binhluan($id) {
        $sql = "SELECT `noidung`, `iduser`, `idpro`, `ngaybinhluan` FROM `binhluan` WHERE id = '$id'";
        $result = pdo_query_one($sql);
        return $result;
    }

    function update_binhluan($noidung, $iduser, $idpro, $ngaybinhluan, $id) {
        $sql = "UPDATE duanmau2023.binhluan SET `noidung`='$noidung',`iduser`='$iduser',`idpro`='$idpro',`ngaybinhluan`='$ngaybinhluan' WHERE id='$id'";
        pdo_execute($sql);
    }

    function delete_binhluan($id) {
        $sql = "DELETE FROM `binhluan` WHERE id = $id";
        pdo_execute($sql);
    }
?>