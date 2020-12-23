<?php 
	class Bill extends ConnectDB{ 
		protected $table_name = "bill";
		public function addBill($idUser,$user_name,$status,$totalMoney,$date){
			return $this->build_query_param(["field"=>"(id_user,user_name,status,total_money,date) values(?,?,?,?,?)","value"=>[$idUser,$user_name,$status,$totalMoney,$date]])->insert();
		}
		public function updateBill($id,$status){
			$this->build_query_param(["param"=>"status =?","where"=>"id = ?","value"=>[$status,$id]])->update();
		}
		public function deleteBill($id){
			$this->build_query_param(["where"=>"id =?","value"=>[$id]])->delete();
		}
		public function selectBill($from,$value,$status){
			return json_decode($this->build_query_param(["select"=>"*","where"=>"status NOT IN ('$status')","other"=>"order by id desc limit $from,$value"])->select(),true);
		}
		public function selectBillById($id){
			return json_decode($this->build_query_param(["select"=>"*","where"=>"id = $id"])->select(),true);
		}
		public function selectBillByIdUser($id_user){
			return json_decode($this->build_query_param(["select"=>"*","where"=>"id_user = $id_user AND NOT status = '0'"])->select(),true);
		}
		public function monthlyStatistics($date){
			return json_decode($this->build_query_param(["select"=>"SUM(total_money)","where"=>"MONTH(date) = $date"])->select(),true);
		}
		public function yearlyStatistics($date){
			return json_decode($this->build_query_param(["select"=>"SUM(total_money)","where"=>"YEAR(date) = $date"])->select(),true);
		}
	}
?>