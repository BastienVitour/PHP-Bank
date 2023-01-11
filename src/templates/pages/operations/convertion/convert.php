<?php
	if(ISSET($_GET['btn_submit'])){
		$digit = $_GET['txt_digit'];
		$currency = $_GET['currency'];
		if($digit != ""){
			switch($currency){
				case "Dollar American":
					$output = $digit * 1.074;
					echo"<center><label class='text-success' style='font-size:25px;'>$".$output."</label></center>";
				break;
				
				case "livre steling":
					$output = $digit * 0.89;
					echo"<center><label class='text-success' style='font-size:25px;'>&#8364;".$output."</label></center>";
				break;
				
				case "Dollar canadien":
					$output = $digit * 1.44;
					echo"<center><label class='text-success' style='font-size:25px;'>&#163;".$output."</label></center>";
				break;
				
				case "Dollar australien":
					$output = $digit * 1.56;
					echo"<center><label class='text-success' style='font-size:25px;'>&#165;".$output."</label></center>";
				break;
				
				case "yen japonais":
					$output = $digit * 142.6;
					echo"<center><label class='text-success' style='font-size:25px;'>&#165;".$output."</label></center>";
				break;
			}
		}
	}
?>