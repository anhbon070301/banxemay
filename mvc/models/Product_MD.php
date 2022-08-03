<?php
 class Product_MD extends DB {
    
        function addProduct( $name , $gia, $hinhanh , $kichthuoc, $chieucaoyen , $kichthuocbanh , $dongco , $cc , $congsuat , $ccnhot, $ccxang , $phanh , $hopso , $tenhang ){
    
            $sql = 'INSERT INTO sanpham VALUES (NULL,"' . $name . '","' . $gia . '","' . $hinhanh . '","' . $kichthuoc . '","' . $chieucaoyen . '","' . $kichthuocbanh . '","' . $dongco . '","' . $cc . '","' . $congsuat . '","' . $ccnhot . '","' . $ccxang . '","' . $phanh . '","' . $hopso . '","' . $tenhang . '")';
            mysqli_query($this->con, $sql);
                       

        }
      
        function updatePMD($id,$name , $gia, $hinhanh , $kichthuoc, $chieucaoyen , $kichthuocbanh , $dongco , $cc , $congsuat , $ccnhot, $ccxang , $phanh , $hopso , $tenhang){

           // $sql = "UPDATE sanpham set tensp = '  $name  ',gia = '  $gia ',hinhanh = ' $hinhanh ' ,kichthuoc = '  $kichthuoc  ',chieucaoyen = ' $chieucaoyen ',sizebanh = ' $kichthuocbanh  ',engine = '  $dongco  ',CC = '  $cc ',congsuat = '  $congsuat  ',CCnhot = '  $ccnhot  ',CCxang = '  $ccxang  ',phanh = '  $phanh  ' ,gear = '  $hopso  ',tenhang = '  $tenhang  '  where id = '  $id  '";
           $sql = 'update sanpham 
           set tensp = "' . $name . '",gia = ' . $gia . ',hinhanh = "' . $hinhanh . '" ,kichthuoc = "' . $kichthuoc . '",chieucaoyen = "' . $chieucaoyen . '",sizebanh = "' . $kichthuocbanh . '",engine = "' . $dongco . '",CC = "' . $cc . '",congsuat = "' . $congsuat . '",CCnhot = "' . $ccnhot . '",CCxang = "' . $ccxang . '",phanh = "' . $phanh . '" ,gear = "' . $hopso . '",tenhang = "' . $tenhang . '" 
           where id = ' . $id . '';
            $this->con->query($sql) ;

                echo '<script> alert("Sua Thanh cong!"); </script>';
              
            
        }  
        function showMD($tenhang){
                $sql = 'SELECT * FROM sanpham Where tenhang = "' . $tenhang . '"';
                return mysqli_query($this->con, $sql);
        }
        function showSP($id){
            $sql = 'SELECT * FROM sanpham Where id = "' . $id . '"';
            return mysqli_query($this->con, $sql);
    }
        function showTH(){
            $sql = 'SELECT * from hang';
            return mysqli_query($this->con, $sql);
    }
        function deleteMD($id){
            $sql = "delete from sanpham where id='".$id."'";
            $this->con->query($sql);
        }


    }   
?>