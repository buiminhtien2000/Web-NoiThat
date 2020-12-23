<?php 
	class ConnectDB{
		protected $host = "localhost";
		protected $user_name = "root";
		protected $password = "";
		protected $database = "web-noithat";
		protected static $connect = null;
		protected $query_param = [];
		protected $table_name;

		public function __construct(){
			$this->connect();
		}

		public function connect(){
			if(self::$connect == null){
				try {
					self::$connect = new PDO('mysql:host='.$this->host.';dbname='.$this->database.";charset=utf8",$this->user_name,$this->password);
					self::$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				} catch (Exception $e) {
					echo $e->getMessage();
					die();
				}
			}
		}

		public function query($sql,$param=[]){
			$stm = self::$connect->prepare($sql);
			if(is_array($param) && $param){
				$stm->execute($param);
			}else{
				$stm->execute();
			}
			return $stm;
		}

		public function build_condition($condition){
			if(trim($condition)){
				return " where ".$condition;
			}else{
				return "";
			}
		}

		public function build_query_param($param){
			$default = [
				"select"=>"",
				"where"=>"",
				"other"=>"",
				"param"=>"",
				"field"=>"",
				"value"=>[]
			];
			$this->query_param = array_merge($default,$param);
			return $this;
		}

		public function insert(){
			$sql = "insert into ".$this->table_name." ".$this->query_param["field"];
			$result = $this->query($sql,$this->query_param["value"]);
			if($result){
				return self::$connect->lastInsertId();
			}else{
				return false;
			}

		}
		public function update(){
			$sql = "update ".$this->table_name." set ".$this->query_param["param"].$this->build_condition($this->query_param["where"])." ".$this->query_param["other"];
			return $this->query($sql,$this->query_param["value"]);
		}
		public function delete(){
			$sql = "delete from ".$this->table_name." ".$this->build_condition($this->query_param["where"])." ".$this->query_param["other"];
			return $this->query($sql,$this->query_param["value"]);
		}
		public function select(){
			$sql = "select ".$this->query_param["select"]." from ".$this->table_name." ".$this->build_condition($this->query_param["where"])." ".$this->query_param["other"];
			$query =  $this->query($sql);
			return json_encode($query->fetchAll(PDO::FETCH_ASSOC));
		}
	}
?>