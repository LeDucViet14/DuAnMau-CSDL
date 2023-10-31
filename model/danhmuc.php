<?php
    function loadall_danhmuc() {
        $sql = "SELECT * FROM duanmau2023.danhmuc order by id desc";
        $listdm = pdo_query($sql);
        return $listdm;
    }

    function load_ten_dm($iddm) {
        if($iddm > 0){
            $sql = "SELECT * FROM duanmau2023.danhmuc where id ='$iddm'";
            $dm = pdo_query_one($sql);
            extract($dm);
            return $name;
        }else{
            return "";
        }
        
    }

    function load_one_dm($id){
        $sql = "SELECT * FROM duanmau2023.danhmuc where id = $id";
        $danhmuc = pdo_query_one($sql);
        return $danhmuc;
    }

    function add_danhmuc($tenloai){
        $sql = "INSERT INTO duanmau2023.danhmuc (`name`) VALUES('$tenloai')";
        pdo_execute($sql);
    }

    function xoadm($id){
        $sql = "DELETE FROM duanmau2023.danhmuc WHERE id=$id";
        pdo_execute($sql);
    }

    function update_dm($id, $tenloai){
        $sql = "UPDATE duanmau2023.danhmuc SET `name`='$tenloai' WHERE id='$id'";
        pdo_execute($sql);
    }

?>