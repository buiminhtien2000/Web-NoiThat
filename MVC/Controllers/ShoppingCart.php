<?php 
	class ShoppingCart extends Controller{
		public function Page(){
			return  $this->View("master1",["page"=>"shoppingCart"]);
		}
	}
?>
