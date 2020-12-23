<?php 
	class ProductDetail extends Controller{
		public function page($id){
			$limit = 8; 
			$product_model = $this->Model("Product");
			$comment_model = $this->Model("Comment");
			$comment = $comment_model->selectByIdProduct($id);
			$product = $product_model->selectByIdProduct($id);
			$product_by_cate = $product_model->selectByCateProduct($id,$product[0]["id_category"],$limit);
			return  $this->View("master1",["page"=>"productDetail","product"=>$product,"productByCate"=>$product_by_cate,"comment"=>$comment]);
		}
		
	}
?>