<?php 
	class ManagerUser extends Controller{
		public function __construct(){
			require_once "./MVC/Lib/FileProcessing.php";
		}
		public function pageAddUser(){
			$this->View("master2",["page"=>"addUser","message"=>""]);
		}
		public function pageUpdateUser(){
			$this->View("master2",["page"=>"updateUser","message"=>""]);
		}
		public function addUser(){
			$file_processing = new FileProcessing();
			$result;
			$form = $file_processing->process_input($_POST);
			$name = $form["name"];
			$account = $form["account"];
			$password = password_hash($form["password"], PASSWORD_DEFAULT);
			$birthday = $form["birthday"];
			$phone_email = $form["phoneOrEmail"];
			$adress = $form["adress"];
			$position = 0;
			$file = $_FILES["file"];
			try {
				if($file != null){
					$tmp_name = $file["tmp_name"];
					$extensions = strtolower(pathinfo($file["name"],PATHINFO_EXTENSION));
					$user_model = $this->Model("User");
					$format_extended = $file_processing->check_file_extension($extensions);
					if($format_extended){
						$check_size = $file_processing->check_size_file(filesize($tmp_name),1024,5*1024*12024);
						if($check_size){
							$randString = $file_processing->rand_string();
							$file_name = $randString.".".$extensions;
							$extension = strtolower(pathinfo($file["name"],PATHINFO_EXTENSION));
							$path = "D:/workspace/www/Web-NoiThat/Public/upload/".$file_name;
							move_uploaded_file($tmp_name,$path);
							$user_model->addUser($name,$account,$password,$birthday,$phone_email,$position$file_name);
							$result = "Thêm thành công!";
						}else{
							$result = "Kích thước file quá lớn!";
						}
					}else{
						$result = "Định dạng file không hợp lệ";
					}
				}else{
					$file_name=Null;
					$user_model->addUser($name,$account,$password,$birthday,$phone_email,$position,$file_name);
				}
				
			} catch (Exception $e) {
				$result = "Thêm thất bại!";
			}
			return $this->View("master2",["page"=>"managerProduct","message"=>$result]);
		}
	}
?>