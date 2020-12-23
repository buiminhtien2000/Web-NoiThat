<?php 
	class Product extends ConnectDB{
		protected $table_name = "products";
		public function addProduct($name,$price,$picture,$category,$quantity,$description){
			$this->build_query_param(["field"=>"(name,price,picture,id_category,quantity,description) values(?,?,?,?,?,?)","value"=>[$name,$price,$picture,$category,$quantity,$description]])->insert();
		}
		public function updateProduct($id,$name,$price,$picture,$category,$quantity,$description){
			if($picture != ""){
				$this->build_query_param(["param"=>"name =?,price =?,picture =?,id_category =?,quantity =?,description =?","where"=>"id =?","value"=>[$name,$price,$picture,$category,$quantity,$description,$id]])->update();
			}else{
				$this->build_query_param(["param"=>"name =?,price =?,id_category =?,quantity =?,description =?","where"=>"id =?","value"=>[$name,$price,$category,$quantity,$description,$id]])->update();
			}
			
		}
		public function deleteProduct($id){
			$this->build_query_param(["where"=>"id =?","value"=>[$id]])->delete();
		}
		public function selectAll(){
			return json_decode($this->build_query_param(["select"=>"*"])->select(),true);
		}
		public function selectProduct($from,$value){
			return json_decode($this->build_query_param(["select"=>"*","other"=>"order by id desc limit $from,$value"])->select(),true);
		}
		public function selectByIdProduct($id){
			return json_decode($this->build_query_param(["select"=>"*","where"=>"id =$id"])->select(),true);
		}
		public function selectByCateProduct($id,$id_category,$limit){
			return json_decode($this->build_query_param(["select"=>"*","where"=>"id_category =$id_category AND NOT id =$id LIMIT $limit"])->select(),true);
		}
	}
?>