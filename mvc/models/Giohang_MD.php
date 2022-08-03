<?php
   class Giohang_MD extends DB {
      
      public function donhang_id($name)
      {
      $sql = 'select * from donhang where ten = "'.$name.'" ORDER BY id DESC';
      return mysqli_query($this->con, $sql);
      }
      
      public function chitietdonhang($id)
      {
      $sql = 'SELECT giohang.id_donhang, sanpham.tensp ,sanpham.hinhanh,giohang.soluong, giohang.gia FROM giohang  JOIN sanpham ON giohang.id_sanpham = sanpham.id WHERE id_donhang = "' . $id . '"';
      return mysqli_query($this->con, $sql);
      }

      public function donhang($id_user)
      {
      $sql = 'SELECT giohang.id_donhang, sanpham.tensp ,sanpham.hinhanh,giohang.soluong, giohang.gia FROM giohang  JOIN sanpham ON giohang.id_sanpham = sanpham.id WHERE id_user = "' . $id_user . '"';
      return mysqli_query($this->con, $sql);
      }

      public function donhangAD(){
         $sql = "SELECT * FROM donhang";
         return mysqli_query($this->con, $sql);
      }
      function deleteGiohang($id){
         $sql = 'delete from donhang where id = "' . $id . '"';
         $sqlgiohang = 'delete from giohang where id_donhang = "' . $id . '"';
         $this->con->query($sql);
         $this->con->query($sqlgiohang);
     }

   }
?>