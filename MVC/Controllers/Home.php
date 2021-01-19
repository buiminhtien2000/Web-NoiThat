<?php 
	class Home extends Controller{
		public function __construct(){
			require_once "./MVC/Lib/FileProcessing.php";
		}
		public static function Page($page=1){
			$product_model = $this->Model("Product");
			$all_product = $product_model->selectAll();
			$limit = 8;
			$from = ($page - 1)*$limit;
			$product = $product_model->selectProduct($from,$limit);
			$totalPage = ceil(sizeof($all_product)/$limit);
			return  $this->View("master1",["page"=>"listProduct","product"=>$product,"totalPage"=>$totalPage]);
		}
		public function Account(){
			$result = "";
			$account = $_SESSION["SessionUser"][0];
			$user_model = $this->Model("User");
			$user = $user_model->selectUserByAccount($account);
			return $this->View("master1",["page"=>"managerAccount","user"=>$user,"message"=>$result]);
		}
		public function ManagerBill(){
			$id_user = $_SESSION["SessionUser"][3];
			$bill_model = $this->Model("Bill");
			$bill = $bill_model->selectBillByIdUser($id_user);
			return $this->View("master1",["page"=>"ManagerBill","bill"=>$bill]);
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
		public function PageLogin(){
			$this->View("login",["message"=>""]);
		}
		public function Login(){
			$file_processing = new FileProcessing();
			$form = $file_processing->process_input($_POST);
			$account = $form["account"];
			$password = $form["password"];
			$user_model = $this->Model("User");
			$user = $user_model->selectUserByAccount($account);
			$message ="";
			if(count($user)>0){
				if(password_verify($password, $user[0]["password"])){
					$message ="Đăng Nhập Thành Công!";
					$_SESSION["SessionUser"] = [$user[0]["account"],$user[0]["name"],$user[0]["position"],$user[0]["id"]];
					if($_SESSION["SessionUser"][2]==true){
						header('Location: http://localhost/Web-NoiThat/ManagerBill');
					}else{
						header('Location: http://localhost/Web-NoiThat/Home');
					}
				}else{
					$message ="Sai Mật Khẩu!";
					$this->View("login",["message"=>$message]);
				}
			}else{
				$message ="Tài Khoản Không tồn Tại!";
				$this->View("login",["message"=>$message]);
			}
		}
		public function PageRegister(){
			$this->View("register",["message"=>""]);
		}
		public function Register(){
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
			try {
				$user_model = $this->Model("User");
				$user_model->addUser($name,$account,$password,$birthday,$phone_email,$position);
				$result = "Đăng Ký Thành Công!,Đăng Nhập Ngay?";
				$this->View("register",["message"=>$result]);
			} catch (Exception $e) {
				$result = "Đăng Ký Thất Bại!";
				$this->View("register",["message"=>$result]);
			}
		}
		public function UpdateAccount(){
			$file_processing = new FileProcessing();
			$result;
			$file = $_FILES["file"];
			$tmp_name = $file["tmp_name"];
			$form = $file_processing->process_input($_POST);
			$name = $form["name"];
			$default_file = $form["defaultfile"];
			$account = $_SESSION["SessionUser"][0];
			$password = password_hash($form["password"], PASSWORD_DEFAULT);
			$birthday = $form["birthday"];
			$phone_email = $form["phoneOrEmail"];
			$adress = $form["adress"];
			$user_model = $this->Model("User");
			try {
				if($file["size"]>0){
					$extensions = strtolower(pathinfo($file["name"],PATHINFO_EXTENSION));
					$format_extended = $file_processing->check_file_extension($extensions);
					if($format_extended){
						$check_size = $file_processing->check_size_file(filesize($tmp_name),1024,5*1024*12024);
						if($check_size){
							$randString = $file_processing->rand_string();
							$file_name = $randString.".".$extensions;
							$extension = strtolower(pathinfo($file["name"],PATHINFO_EXTENSION));
							$path = "D:/workspace/www/Web-NoiThat/Public/upload/".$file_name;
							move_uploaded_file($tmp_name,$path);
							$user_model->updateUser($name,$account,$password,$birthday,$phone_email,$adress,$file_name);
							$result = "Cập nhật thành công!";
						}else{
							$result = "Kích thước file quá lớn!";
						}
					}else{
						$result = "Định dạng file không hợp lệ";
					}
				}else{
					$user_model->updateUser($name,$account,$password,$birthday,$phone_email,$adress,$default_file);
					$result = "Cập nhật thành công!";
				}
			} catch (Exception $e) {
				$result = $e->getMessage();
			}
			$user = $user_model->selectUserByAccount($account);
			return $this->View("master1",["page"=>"managerAccount","user"=>$user,"message"=>$result]);
		}
		public function Logout(){
			unset($_SESSION["SessionUser"]);
			header('Location: http://localhost/Web-NoiThat/Home');
		}
	}
?>