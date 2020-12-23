<?php  
	class User extends ConnectDB{
		protected $table_name = "users"; 
		public function addUser($name,$account,$password,$birthday,$phone_email,$position){
			$this->build_query_param(["field"=>"(name,account,password,birthday,phoneOrEmail,position) values(?,?,?,?,?,?)","value"=>[$name,$account,$password,$birthday,$phone_email,$position]])->insert();
		}
		public function updateUser($name,$account,$password,$birthday,$phone_email,$adress,$picture){
			$this->build_query_param(["param"=>"name =?,password =?,birthday =?,phoneOrEmail =?,adress =?,picture =?","where"=>"account =?","value"=>[$name,$password,$birthday,$phone_email,$adress,$picture,$account]])->update();
		}
		public function deleteUser($id){
			$this->build_query_param(["where"=>"id =?","value"=>[$id]])->delete();
		}
		public function selectUser($from,$value){
			return json_decode($this->build_query_param(["select"=>"*","other"=>"order by id desc limit $from,$value"])->select(),true);
		}
		public function selectUserByAccount($account){
			return json_decode($this->build_query_param(["select"=>"*","where"=>"account = '$account'"])->select(),true);
		}
		public function selectUserById($id){
			return json_decode($this->build_query_param(["select"=>"*","where"=>"id = $id"])->select(),true);
		}
	}
?>