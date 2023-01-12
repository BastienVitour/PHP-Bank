<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>
	<nav>
		<div >
			
		</div>
	</nav>
	<div></div>
	<div>
		<h3>Euro convertiseur</h3>
		<hr style="border-top:1px dotted #000;"/>
		<form method="GET" action="">
			<div>
				<label>Euro:</label>
				<input type="text" name="txt_digit"/>
				<label>choix de la money: </label>
				<select name="currency">
					<option value="">Selection de l'option</option>
					<option value="Dollar American">Dollar american</option>
					<option value="livre steling">livre sterling</option>
					<option value="Dollar canadien">Dollar canadien</option>
					<option value="Dollar australien">Dollar australien</option>
					<option value="yen japonais">yen japonais</option>
				</select>
				<br /><br />
				<center><button type="submit" name="btn_submit" style="width:30%;">Convertion</button></center>
				<br />
				
			</div>
		</form>
	</div>

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
					echo"<center><label class='text-success' style='font-size:25px;'>&#8383;".$output."</label></center>";
				break;
			}
		}
	}
?>
</body>
</html>