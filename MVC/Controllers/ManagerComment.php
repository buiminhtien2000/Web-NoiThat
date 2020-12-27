<?php 
	class ManagerComment extends Controller{
		public function page(){
			$this->View("master2",["page"=>"managerComment"]);
		}
		public function ListComment(){
			$id_user = $_SESSION["SessionUser"][3];
			$comment_model = $this->Model("Comment");
			$comment = $comment_model->selectAll($id_user);
			$this->View("master2",["page"=>"managerComment","comment"=>$comment]);
		}
	}
?>