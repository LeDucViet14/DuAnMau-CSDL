<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
            <form action="index.php?act=listsp" method="POST">
                <input type="text" name="keyw">
                <select name="iddm" id="">
                    <option value="0" selected>ALL</option>
                    <?php
                        foreach($listdanhmuc as $danhmuc){
                            extract($danhmuc);
                            echo '
                                <option value="'.$id.'">'.$name.'</option>                          
                            ';
                        }
                    ?>
                </select>
                <input type="submit" name="clickOK" value="Tim kiem">
            </form>
            <table>
                <tr>
                    <th></th>
                    <th>MÃ SP</th>
                    <th>TÊN SP</th>
                    <th>GIÁ</th>
                    <th>HÌNH</th>
                    <th>LƯỢT XEM</th>
                    <th>Chỉnh</th>
                </tr>
                
                    <?php
                        foreach($listsanpham as $sanpham){
                            extract($sanpham);
                            echo '
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>'.$id.'</td>
                                <td>'.$name.'</td>
                                <td>'.$price.'</td>
                                <td><img src="../upload/'.$img.'" alt="" style="width:100px"></td>
                                <td>'.$luotxem.'</td>
                                <td><a href="index.php?act=suasp&idsp='.$id.'">Sửa</a> | <a href="index.php?act=xoasp&id='.$id.'">Xoá</a></td>

                            </tr>'; 
                        }
                    ?>
                
            
                
            </table>
           </div>
           <div class="row mb10 ">
         <input class="mr20" type="button" value="CHỌN TẤT CẢ">
         <input  class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
        <a href="index.php?act=addsp"> <input  class="mr20" type="button" value="NHẬP THÊM"></a>
        <a href="index.php?act=bieudosp"> <input  class="mr20" type="button" value="BIỂU ĐỒ BÌNH LUẬN THEO SP"></a>
           </div>
          </form>
         </div>
        </div>



       
    </div>