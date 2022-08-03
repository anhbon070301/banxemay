<?php
 class Category extends Controller{

    function addcategory(){
        if(isset( $_POST['them'])){
            if (!empty($_POST)) {
        $name = '';
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $hinhanh = $_POST['hinhanh'];
            
        }
   
        if (!empty($name) && !empty($hinhanh)) {
            $categoryMD = $this->model("category_MD");
            $categoryMD->addcategory($name , $hinhanh);
            header('Location: /banxemaymvc/Category/show');
            
        }
    }  
    }else{
        $categoryMD = $this->model("category_MD");
        $this->viewAD("addcategoryAD",["hang"=>$categoryMD->showTH()]);
        }
    }


    function updatecategory($name){

        if (isset($_POST["sua"])) {

            $hinhanh = '';

        if (isset($_POST['hinhanh'])) {
            $name = $_POST['name'];
            $hinhanh = $_POST['hinhanh'];
        }
        if (!empty($hinhanh)) {
                $categoryMD = $this->model("category_MD");
                $categoryMD->updateCMD($name , $hinhanh );           
                header('Location: /banxemaymvc/category/show/');
                die();
            }
        }
    else{
        $categoryMD = $this->model("category_MD");
        $productMD = $this->model("Product_MD");
        $this->viewAD("updateCategoryAD",["categoryMD"=>$categoryMD->showMD($name),"hang"=>$productMD->showTH()]);
    }
    }
    function show(){
        $categoryMD = $this->model("category_MD");
        $productMD = $this->model("Product_MD");
        $this->viewAD("categoryAD",["category"=>$categoryMD->showTH(),"hang"=>$productMD->showTH()]);
    }
    function delete($tenhang){
        $categoryMD = $this->model("category_MD");
        $categoryMD->deleteMD($tenhang);
        header('Location: /banxemaymvc/category/show/');
    }

}
?>
