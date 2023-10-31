<?php
    function load_thongke_sanpham_danhmuc() {
        $sql="SELECT dm.id, dm.name, COUNT(*) 'soluong', MIN(price) 'gia_min', MAX(price) 'gia_max', AVG(price) 'gia_trung_binh' 
        FROM danhmuc as dm JOIN sanpham as sp ON dm.id = sp.iddm GROUP BY dm.id, dm.name ORDER BY soluong DESC";
        return pdo_query($sql);
    }
?>