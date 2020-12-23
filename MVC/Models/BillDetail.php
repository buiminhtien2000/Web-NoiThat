<?php 
	class BillDetail extends ConnectDB{
		protected $table_name = "bill_detail";
		public function addBillDetail($idBill,$idProduct,$product_name,$price,$quantity){
			$this->build_query_param(["field"=>"(idBill,idProduct,product_name,price,quantity) values(?,?,?,?,?)","value"=>[$idBill,$idProduct,$product_name,$price,$quantity]])->insert();
		}
		public function updateBillDetail($id,$quantity){
			$this->build_query_param(["param"=>"quantity =?","where"=>"id = ?","value"=>[$quantity,$id]])->update();
		}
		public function deleteBillDetail($id){
			return $this->build_query_param(["where"=>"id =?","value"=>[$id]])->delete();
		}
		public function selectBillDetail($idBill){
			return json_decode($this->build_query_param(["select"=>"*","where"=>"idBill = $idBill"])->select(),true);
		}
	}
?>