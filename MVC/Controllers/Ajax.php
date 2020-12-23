<?php 
	class Ajax extends Controller{
		public function Comment(){
			if(isset($_SESSION["SessionUser"])){
				$parent_id;
				if(isset($_POST["parentId"]) && $_POST["parentId"] != ''){
					$parent_id = (int)$_POST["parentId"];
				}else{
					$parent_id = null;
				}
				$id_user = $_SESSION["SessionUser"][3];
				$user_name = $_SESSION["SessionUser"][1];
				$id_product = (int)$_POST["idProduct"];
				$content = $_POST["content"];
				$comment_model = $this->Model("Comment");
				$comment = $comment_model->addComment($id_user,$id_product,$parent_id,$content,$user_name);
				echo true;
			}else{
				echo false;
			}
			
		}
		public function pay(){
			$kq=false;
			$bill_model = $this->Model("Bill");
			$bill_detail_model = $this->Model("BillDetail");
			$status = 1;
			$list_bill = json_decode($_POST["bill"]);
			$totalMoney = 0;
			$date = date("Y/m/d");
			if(isset($_SESSION["SessionUser"])){
				$id_user = $_SESSION["SessionUser"][3];
				$user_name = $_SESSION["SessionUser"][1];
				for ($i=0; $i < count($list_bill); $i++) { 
					$totalMoney += $list_bill[$i]->totalMoney;
				}
				$id_bill = $bill_model->addBill($id_user,$user_name,$status,$totalMoney,$date);
				if($id_bill != null){
					for ($i=0; $i < count($list_bill); $i++) { 
						$bill_detail_model->addBillDetail($id_bill,$list_bill[$i]->idProduct,$list_bill[$i]->productName,$list_bill[$i]->price,$list_bill[$i]->quantity);
					}
					$kq=true;
				}else{
					$kq=false;
				}
			}else{
				$kq=false;
			}
			echo $kq;
		}
	}
?>