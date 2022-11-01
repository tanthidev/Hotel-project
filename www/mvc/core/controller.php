<?php 
    class controller{
        public static function model($model){
            require_once "./mvc/models/".$model.".php";
            return new $model;
        }

        public static function view($view, $data=[]){
            require_once "./mvc/views/".$view.".php";
        }
    }
?>