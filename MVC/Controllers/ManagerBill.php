<?php 
	class ManagerBill extends Controller{
		public static function Page(){
			$bill_model = $this->Model("Bill");
			$bill = $bill_model->selectBill(0,12,0);
			$this->View("master2",["page"=>"managerBill","list_bill"=>$bill]);
		}
		public function BillDetail($id_bill,$id_user){
			$bill_model = $this->Model("Bill");
			$bill_detail_model = $this->Model("BillDetail");
			$user_model = $this->Model("User");
			$bill = $bill_model->selectBillById($id_bill);
			$user = $user_model->selectUserById($id_user);
			$bill_detail = $bill_detail_model->selectBillDetail($id_bill);
			$this->View("master2",["page"=>"billDetail","bill_detail"=>$bill_detail,"user"=>$user,"bill"=>$bill]);
		}
		public function UpdateBill(){
			$id = $_POST["id"];
			$status = $_POST["status"];
			$bill_model = $this->Model("Bill");
			try {
				$bill = $bill_model->updateBill($id,$status);
				echo true;
			} catch (Exception $e) {
				echo false;
			}
		}
		public function cancelBill(){
			$bill_model = $this->Model("Bill");
			$bill = $bill_model->deleteBill($id);
			return "Cập nhật thành công!";
		}
	}
?>