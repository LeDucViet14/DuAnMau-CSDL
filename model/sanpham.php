<?php
    // hiển thị tất cả sản phẩm
    function loadall_sanpham_home() {
        $sql = "SELECT * FROM duanmau2023.sanpham where 1 order by id desc limit 0,9";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    //hiển thị top 10 có lượt xem cao nhất
    function loadall_sanpham_top10() {
        $sql = "SELECT * FROM duanmau2023.sanpham where 1 order by luotxem desc limit 0,10";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }

    function loadall_sanpham($keyw = "", $iddm = 0){
        $sql = "SELECT * FROM sanpham where 1";
        if($keyw != ""){
            $sql.=" and name like '%".$keyw."%'";
        }
        if($iddm>0){
            $sql.=" and iddm ='".$iddm."'";
        }
        $sql.=" order by id desc";
        $listsanpham=pdo_query($sql);
        return $listsanpham;
    }

    // function load_binhluan_sanpham(){
    //     $sql = "SELECT sp.id,COUNT(bl.id) as soBinhLuan
    //     FROM duanmau2023.sanpham as sp
    //     join binhluan as bl ON sp.id = bl.idpro
    //     WHERE 1
    //     group by sp.id order by soBinhLuan";
    //     return pdo_query($sql);
    // }

    function loadone_sanpham($id) {
        $sql = "SELECT * FROM duanmau2023.sanpham where id = $id";
        $result = pdo_query_one($sql);
        return $result;
    }

    function loadsp_cungloai($id, $iddm) {
        $sql = "SELECT * FROM duanmau2023.sanpham where iddm = $iddm and id <> $id"; // hiển thị sp cùng danh mục nhưng khác sp hiện tại
        $result = pdo_query($sql);
        return $result;
    }

    function insert_sanpham($tensp, $giasp, $mota, $hinh, $iddm) {
        $sql = "INSERT INTO duanmau2023.sanpham(`name`, `price`, `img`, `mota`, `iddm`)
                VALUES('$tensp', '$giasp', '$hinh', '$mota', '$iddm')";
        pdo_execute($sql);
    }

    function update_sanpham($iddm, $tensp, $giasp, $mota, $hinh, $id){
        if($hinh != ""){
            $sql = "UPDATE duanmau2023.sanpham SET `name`='$tensp',`price`='$giasp', `img`='$hinh', `mota`='$mota', `iddm`='$iddm' WHERE id = '$id'";
        }else{
            $sql = "UPDATE duanmau2023.sanpham SET `name`='$tensp',`price`='$giasp', `mota`='$mota', `iddm`='$iddm' WHERE id = '$id'";
        }
        pdo_execute($sql);
    }

    function xoasp($id){
        $sql = "DELETE FROM duanmau2023.sanpham WHERE id=$id";
        pdo_execute($sql);
    }
?>