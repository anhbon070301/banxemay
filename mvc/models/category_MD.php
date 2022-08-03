<?php
 class category_MD extends DB {

        function addcategory( $name , $hinhanh  ){
          
            $sql = 'INSERT INTO hang(tenhang, logo) VALUES ("' . $name . '","' . $hinhanh . '")';
            mysqli_query($this->con, $sql);
                 
        }
      
        function updateCMD($name , $hinhanh ){

            $sql = 'UPDATE hang SET logo="'. $hinhanh .'" WHERE tenhang="'. $name .'"';
            $this->con->query($sql) ;
            echo '<script> alert("Sua Thanh cong!"); </script>';
                  
        }  
        function showMD($tenhang){
                $sql = 'SELECT * FROM hang Where tenhang = "' . $tenhang . '"';
                return mysqli_query($this->con, $sql);
        }
        function showTH(){
            $sql = 'SELECT * FROM hang' ;
            return mysqli_query($this->con, $sql);
        }
        function deleteMD($tenhang){
            $sql = "delete from hang where tenhang='".$tenhang."'";
            $this->con->query($sql);
        }

    }   
?>