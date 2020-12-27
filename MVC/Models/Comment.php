<?php 
	class Comment extends ConnectDB{ 
		protected $table_name = "comment";
		public function addComment($id_user,$id_product,$parent_id,$content,$user_name){
			$this->build_query_param(["field"=>"(id_user,id_product,parent_id,content,user_name) values(?,?,?,?,?)","value"=>[$id_user,$id_product,$parent_id,$content,$user_name]])->insert();
		}
		public function updateComment($id,$content){
			$this->build_query_param(["param"=>"content =?","where"=>"id =?","value"=>[$content,$id]])->update();
		}
		public function deleteComment($id){
			$this->build_query_param(["where"=>"id =?","value"=>[$id]])->delete();
		}
		public function selectByIdProduct($id_product){
			return json_decode($this->build_query_param(["select"=>"*","where"=>"id_product = $id_product ORDER BY id ASC"])->select(),true);
		}
		public function selectAll($id_user){
			return json_decode($this->build_query_param(["select"=>"*","where"=>"NOT id_user=$id_user ORDER BY id DESC LIMIT 0,50"])->select(),true);
		}
		public function selectByIdParent($idGroup){
			return json_decode($this->build_query_param(["select"=>"*","where"=>"id_group = $idGroup"])->select(),true);
		}
	}
?>