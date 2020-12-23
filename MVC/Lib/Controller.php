<?php 
	class Controller{
		public function Model($model){
			require_once "./MVC/Models/".$model.".php";
			return new $model;
		}
		public function View($view,$data=[]){
			require_once "./MVC/Views/".$view.".php";
		}
	}
	
?>