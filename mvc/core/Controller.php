<?php
class Controller{

    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public function view($view, $data=[]){
        require_once "./mvc/views/web/".$view.".php";
    }

    public function viewAD($view, $data=[]){
        require_once "./mvc/views/admin/".$view.".php";
    }
}
?>