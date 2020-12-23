<?php 
	class App{
		protected $controller = "Home";
		protected $action = "Page";
		protected $param = [];
		function __construct(){
			$arr = $this->getUrl();
			if(file_exists("./MVC/Controllers/".$arr[0].".php")){
				if($arr[0] == "ManagerBill" || $arr[0] == "ManagerComment" || $arr[0] == "ManagerProduct" || $arr[0] == "ManagerUser"){
				 	if(!isset($_SESSION["SessionUser"]) || $_SESSION["SessionUser"][2]==false){
				 		$this->controller = "Home";
				 	}else{
				 		$this->controller = $arr[0];
				 	}
				}else{
					$this->controller = $arr[0];
				}
			}
			unset($arr[0]);
			require_once "./MVC/Controllers/".$this->controller.".php";
			$this->controller = new $this->controller;
			if(isset($arr[1])){
				if(method_exists($this->controller,$arr[1])){
					$this->action = $arr[1];
				}
				unset($arr[1]);
			}
			$this->param = $arr?array_values($arr):[];
			call_user_func_array([$this->controller,$this->action], $this->param);
		}
		function getUrl(){
			if(isset($_GET["url"])){
				return explode("/",filter_var(trim($_GET["url"],"/")));
			}
		}
	}
?>