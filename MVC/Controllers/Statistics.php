<?php 
	class Statistics extends Controller{
		public function RevenueMonthly(){
			$statistics = [];
			if(isset($_POST["date"])){
				$date = (int)$_POST["date"];
			}else{
				$date = date("m");
			}
			$bill_model = $this->Model("Bill");
			$this_month = $bill_model->monthlyStatistics($date);
			$last_month = $bill_model->monthlyStatistics($date-1);
			$statistics.push($this_month);
			$statistics.push($last_month);
			echo json_encode($statistics);
		}
		public function RevenueYearly(){
			$statistics = [];
			if(isset($_POST["date"])){
				$date = (int)$_POST["date"];
			}else{
				$date = date("Y");
			}
			$bill_model = $this->Model("Bill");
			$this_year = $bill_model->yearlyStatistics($date);
			$last_year = $bill_model->yearlyStatistics($date-1);
			$statistics.push($this_year);
			$statistics.push($last_year);
			echo json_encode($statistics);
		}
	}
?>