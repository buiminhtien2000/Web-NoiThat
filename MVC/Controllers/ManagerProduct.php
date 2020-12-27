<?php 
	class ManagerProduct extends Controller{
		public function __construct(){
			require_once "./MVC/Lib/FileProcessing.php";
		}
		public static function Page(){
			return $this->View("master2",["page"=>"addProduct","message"=>""]);
		}
		public function pageUpdateProduct($id,$message=""){
			$product_model = $this->Model("Product");
			$category_model = $this->Model("Category");
			$product =$product_model->selectByIdProduct($id);
			$category = $category_model->selectCategory();
			return $this->View("master2",["page"=>"updateProduct","product"=>$product,"category"=>$category,"message"=>$message]);
		}
		public function addProduct(){
			$file_processing = new FileProcessing();
			$result;
			$form = $file_processing->process_input($_POST);
			$name = $form["name"];
			$price =  (float)$form["price"];
			$file = $_FILES["file"];
			$tmp_name = $file["tmp_name"];
			$quantity = (int)$form["quantity"];
			$category = (int)$form["category"];
			$description = $form["description"];
			try {
				$extensions = strtolower(pathinfo($file["name"],PATHINFO_EXTENSION));
				$product_model = $this->Model("Product");
				$format_extended = $file_processing->check_file_extension($extensions);
				if($format_extended){
					$check_size = $file_processing->check_size_file(filesize($tmp_name),1024,5*1024*1024);
					if($check_size){
						$randString = $file_processing->rand_string();
						$file_name = $randString.".".$extensions;
						$extension = strtolower(pathinfo($file["name"],PATHINFO_EXTENSION));
						$path = "D:/workspace/www/Web-NoiThat/Public/upload/".$file_name;
						move_uploaded_file($tmp_name,$path);
						$product_model->addProduct($name,$price,$file_name,$category,$quantity,$description);
						$result = "Thêm thành công!";
					}else{
						$result = "Kích thước file quá lớn!";
					}
				}else{
					$result = "Định dạng file không hợp lệ";
				}
			} catch (Exception $e) {
				$result = "Thêm thất bại!";
			}
			return $this->listProduct($result);
		}
		public function updateProduct(){
			$file_processing = new FileProcessing();
			$result;
			$form = $file_processing->process_input($_POST);
			$id = $form["id"];
			$name = $form["name"];
			$price =  (float)$form["price"];
			$file = $_FILES["file"];
			$quantity = (int)$form["quantity"];
			$category = (int)$form["category"];
			$description = $form["description"];
			$product_model = $this->Model("Product");
			$category_model = $this->Model("Category");
			try {
				if($file["size"]>0){
					$tmp_name = $file["tmp_name"];
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
							$product_model->updateProduct($id,$name,$price,$file_name,$category,$quantity,$description);
							$result = "Cập nhật thành công!";
						}else{
							$result = "Kích thước file quá lớn!";
						}
					}else{
						$result = "Định dạng file không hợp lệ";
					}
				}else{
					$file_name = "";
					$product_model->updateProduct($id,$name,$price,$file_name,$category,$quantity,$description);
					$result = "Cập nhật thành công!";
				}
			} catch (Exception $e) {
				$result = "Cập nhật thất bại!";
			}
			return $this->listProduct($result);
		}
		public function deleteProduct($id){
			$product_model = $this->Model("Product");
			$product_model->deleteProduct($id);
			$list_product = $product_model->selectProduct(0,10);
			return $this->View("master2",["page"=>"listProduct","listProduct"=>$list_product,"message"=>"Xóa thành công!"]);
		}
		public function listProduct($message=""){
			$list_product = [];
			$product_model = $this->Model("Product");
			$list_product = $product_model->selectProduct(0,10);
			return $this->View("master2",["page"=>"listProduct","listProduct"=>$list_product,"message"=>$message]);
		}
	}

	?>