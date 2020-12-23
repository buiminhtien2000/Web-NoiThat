<?php 
	class Category extends ConnectDB{
		protected $table_name = "categories";
		public function addCategory($name){
			$this->build_query_param(["field"=>"(name) values(?)","value"=>[$name]])->insert();
		}
		public function updateCategory($id,$name){
			$this->build_query_param(["param"=>"name =?","where"=>"id =?","value"=>[$name,$id]])->update();
		}
		public function deleteCategory($id){
			$this->build_query_param(["where"=>"id =?","value"=>[$id]])->delete();
		}
		public function selectCategory(){
			return json_decode($this->build_query_param(["select"=>"*"])->select(),true);
		}
	}
?>