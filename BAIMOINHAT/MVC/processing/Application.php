<?php
    class Application{
        protected $controller = "Home"; // Home la class nam trong controller(class)
        protected $action= "displayIntroduction"; //action(chua cac methot) hien thi len phan gioi thieu displayIntroduction na trong Home
        protected $paramr = []; // 

        function __construct()
        {
            $arr = $this->urlProcess();
            $n = count($arr);
            // xu ly controller
            if(file_exists("./MVC/controllers/".$arr[$n-2].".php")){
                $this->controller = $arr[$n-2];
                unset($arr[$n-2]);
            }

            require_once "./MVC/controllers/".$this->controller .".php";
            $this->controller = new $this->controller;

            //xu ly actions
            if(isset($arr[$n-1])){
                if(method_exists($this->controller, $arr[$n-1])){
                    $this->action = $arr[$n-1];
                }
                unset($arr[$n-1]);
            }

            //su ly params
            $this->paramr = $arr ? array_values($arr) : [];
            call_user_func_array([new $this->controller, $this->action], $this->paramr);

            
        }

        function urlProcess()
        { 
            if(isset($_SERVER["REQUEST_URI"])){
                //echo $_SERVER["REQUEST_URI"], "<br>";
                return explode("/", filter_var(trim($_SERVER['REQUEST_URI'], "/")));
            }

        }

    }
?>