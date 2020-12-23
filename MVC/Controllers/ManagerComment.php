<?php 
	class ManagerComment extends Controller{
		public function page(){
			$this->View("master2",["page"=>"managerComment"]);
		}
		public function ListComment(){
			$comment_model = $this->Model("Comment");
			$comment = $comment_model->selectAll();
			$detail_comment = $comment_model->selectByIdGruop($idGroup);
			$this->View("master2",["page"=>"managerComment","comment"]);
		}
	}
?>