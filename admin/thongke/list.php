<div class="row2">
         <div class="row2 font_title">
          <h1>THỐNG KÊ SẢN PHẨM TRONG DANH MỤC</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th></th>
                <th>MÃ ID</th>
                <th>TÊN SẢN PHẨM</th>
                <th>SỐ LƯỢNG</th>
                <th>GIÁ MIN</th>
                <th>GIÁ MAX</th>
                <th>GIÁ TRUNG BÌNH</th>
            </tr>
            
                <?php
                    foreach($dsthongke as $thongke){
                        extract($thongke);
                        $xoabl = "index.php?act=xoabl&id=".$id;
                        echo 
                        '
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>'.$id.'</td>
                            <td>'.$name.'</td>
                            <td>'.$soluong.'</td>
                            <td>$ '.$gia_min.'</td>
                            <td>$ '.$gia_max.'</td>
                            <td>$ '.number_format($gia_trung_binh, 2).'</td>                           
                        </tr>
                        ';
                    }
                ?>
                
            
           
            
           </table>
           </div>
           <div class="row mb10 ">
            <a href="index.php?act=bieudo"> <input  class="mr20" type="button" value="XEM BIỂU ĐỒ"></a>
           </div>
          </form>
         </div>
        </div>



       
    </div>