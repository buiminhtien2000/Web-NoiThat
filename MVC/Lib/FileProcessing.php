<?php 
	class FileProcessing{
		public function check_size_file($size,$min,$max){
			echo $size;
			$result = false;
			if($size >= $min && $size <= $max){
				$result = true;
			}
			return $result;
		}

		public function check_file_extension($extensions){
			$format_extended = ["jpg","png","gif"];
			$lenght = count($format_extended);
			$result = false;
			for ($i=0; $i < $lenght; $i++) {
				if($extensions == $format_extended[$i]){
					$result = true;
					break;
				}
			}
			return $result;
		}
		public function rand_string(){
			$randBit = random_bytes(16); 
    		return bin2hex($randBit);
		}

		public function process_input($input_data){
			$form = $input_data;
			$arr_key = array_keys($form);
			$arr_value = [];
			foreach ($form as $key => $value) {
				array_push($arr_value,addslashes(htmlentities(trim($value))));
			}
			return $result = array_combine($arr_key,$arr_value);
		}
	}
?>