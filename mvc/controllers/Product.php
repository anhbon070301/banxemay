<?php
 class Product extends Controller{

    function addProduct(){
        if(isset( $_POST['them'])){
            if (!empty($_POST)) {
                $name = '';
                $gia = '';
                if (isset($_POST['gia']) && isset($_POST['name'])) {
                    $name = $_POST['name'];
                    $gia = $_POST['gia'];
                    $hinhanh = $_POST['hinhanh'];
                    $kichthuoc = $_POST['kichthuoc'];
                    $chieucaoyen = $_POST['chieucaoyen'];
                    $kichthuocbanh = $_POST['kichthuocbanh'];
                    $dongco = $_POST['dongco'];
                    $cc = $_POST['cc'];
                    $congsuat = $_POST['congsuat'];
                    $ccnhot = $_POST['ccnhot'];
                    $ccxang = $_POST['ccxang'];
                    $phanh = $_POST['phanh'];
                    $hopso = $_POST['hopso'];
                    $tenhang = $_POST['tenhang'];
                }
            
            
                if (!empty($name) && !empty($gia)) {
                    $ProductMD = $this->model("Product_MD");
                    $ProductMD->addProduct( $name , $gia, $hinhanh , $kichthuoc, $chieucaoyen , $kichthuocbanh , $dongco , $cc , $congsuat , $ccnhot, $ccxang , $phanh , $hopso , $tenhang);
                    header('Location: ./show/' . $tenhang . '');
                    die();
                }
    }  
    }else{
        $ProductMD = $this->model("Product_MD");
        $this->viewAD("addProductAD",["hang"=>$ProductMD->showTH()]);
        }
    }


    function updateProduct($id,$tenhang){

        if (isset($_POST["sua"])) {

            $name = $_POST['name'];
            $gia = $_POST['gia'];
            $hinhanh = $_POST['hinhanh'];
            $kichthuoc = $_POST['kichthuoc'];
            $chieucaoyen = $_POST['chieucaoyen'];
            $kichthuocbanh = $_POST['kichthuocbanh'];
            $dongco = $_POST['dongco'];
            $cc = $_POST['cc'];
            $congsuat = $_POST['congsuat'];
            $ccnhot = $_POST['ccnhot'];
            $ccxang = $_POST['ccxang'];
            $phanh = $_POST['phanh'];
            $hopso = $_POST['hopso'];
            $ProductMD = $this->model("Product_MD");
            $ProductMD->updatePMD($id,$name , $gia, $hinhanh , $kichthuoc, $chieucaoyen , $kichthuocbanh , $dongco , $cc , $congsuat , $ccnhot, $ccxang , $phanh , $hopso , $tenhang);
        
            header('Location: /banxemaymvc/Product/show/' . $tenhang . '');
            die();
        }
        else{
            $ProductMD = $this->model("Product_MD");
            $this->viewAD("updatePDAD",["view"=>$ProductMD->showSP($id),"hang"=>$ProductMD->showTH()]);
        }
    }
    function show($tenhang){

        $ProductMD = $this->model("Product_MD");
        $this->viewAD("productAD",["product"=>$ProductMD->showMD($tenhang),"hang"=>$ProductMD->showTH(),"tenhang"=>$tenhang]);
    }
    function delete($id,$tenhang){
        $ProductMD = $this->model("Product_MD");
        $ProductMD->deleteMD($id);
        header('Location: /banxemaymvc/Product/show/' . $tenhang . '');
    }

    function hang_xe($tenhang)
    {
        $ProductMD = $this->model("Product_MD");
        $this->view("product",["product"=>$ProductMD->showMD($tenhang),"hang"=>$ProductMD->showTH(),"tenhang"=>$tenhang]);
    }

    function series ($id, $tenhang) {
        $ProductMD = $this->model("Product_MD");
        $this->view("buycar",["product"=>$ProductMD->showMD($tenhang),"product_id"=>$ProductMD->showSP($id),"hang"=>$ProductMD->showTH(),"tenhang"=>$tenhang,"id"=>$id]);
    }
    
}
?>
