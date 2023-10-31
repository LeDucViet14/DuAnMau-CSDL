<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH KHÁCH HÀNG</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th></th>
                <th>Mã KHÁCH HÀNG</th>
                <th>USER</th>
                <th>PASS</th>
                <th>EMAIL</th>
                <th>ADDRESS</th>
                <th>TEL</th>
                <th>VAI TRÒ</th>
            </tr>
            
                <?php
                    foreach($alluser as $taikhoan){
                        extract($taikhoan);
                        $suatk = "index.php?act=suatk&id=".$id;
                        $xoatk = "index.php?act=xoatk&id=".$id;
                        echo 
                        '
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>'.$id.'</td>
                            <td>'.$user.'</td>
                            <td>'.$pass.'</td>
                            <td>'.$email.'</td>
                            <td>'.$address.'</td>
                            <td>'.$tel.'</td>
                            <td>'.$role.'</td>
                            <td style="display:flex">
                                <a style="padding-right:5px" href="'.$suatk.'">Sửa</a> |
                                <a style="padding-left:5px" href="'.$xoatk.'">Xoá</a>
                            </td>
                            
                        </tr>
                        ';
                    }
                ?>
                
            
           
            
           </table>
           </div>
           <div class="row mb10 ">
         <input class="mr20" type="button" value="CHỌN TẤT CẢ">
         <input  class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
         <a href="../index.php?act=dangky"><input  class="mr20" type="button" value="NHẬP THÊM"></a>
           </div>
          </form>
         </div>
        </div>



       
    </div>