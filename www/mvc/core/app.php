<?php
    class app{
        protected $controller="home";
        protected $action="default";
        protected $params=[];

        function __construct(){
            $arr = $this ->UrlProcess();
            // Xu ly controller
            if($arr != null){
                if(file_exists("./mvc/controllers/".$arr[0].".php")){
                    $this -> controller = $arr[0];
                    unset($arr[0]);
                    
                    
                    require_once("./mvc/controllers/".$this->controller.".php");
                    $this-> controller = new $this -> controller;
                    
                    
                    //Xử lý actione
                    
                    if(isset($arr[1])){
                        if(method_exists($this -> controller, $arr[1])){
                            $this -> action = $arr[1];                            
                        }
                        unset($arr[1]);
                    }
    
                    //Xử lý params
                    if(array_values($arr)){
                        $this -> params = $arr;
                    }
                    else{
                        $this -> params = [];
                    }
                }
                else {
                    require_once("./mvc/controllers/".$this->controller.".php");
                    $this-> controller = new $this -> controller;
                }
            } else {
                require_once("./mvc/controllers/".$this->controller.".php");
                $this-> controller = new $this -> controller;
            }
            
            
            
            //Gọi hàm
            call_user_func_array([$this->controller, $this->action], []);
            // print_r( $this->params);
        }

        function UrlProcess(){
            if($_GET["url"]!=""){
                return explode("/", filter_var(trim($_GET["url"], "/")));
                
            } 
        }

    }

    // wwww/lisroom/a
?>