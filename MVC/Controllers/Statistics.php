<?php 
	class Statistics extends Controller{
		public function page(){
			return $this->View("master2",["page"=>"statistic"]);
		}
	}
?>