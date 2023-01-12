<?php

$page_title = "Conversion du Bitcoin";

ob_start();

?>

<nav >
	<div>
		
	</div>
</nav>
<div></div>
<div>
	<h3 >convertiseur du Bitcoin</h3>
	<hr style="border-top:1px dotted #000;"/>
	<form method="POST" action="">
		<div>
		<label >Bitcoin:</label>
			<input type="text" name="txt_digit"/>
			<label>Choix de la monnaie : </label>
			<select name="currency">
				<option value="">Selection de la monnaie</option>
				<option value="Dollar americain">Dollar americain</option>
				<option value="Livre Sterling">Livre Sterling</option>
				<option value="Euro">Euro</option>
				<option value="Dollar australien">Dollar australien</option>
				<option value="Yen japonais">Yen japonais</option>
			</select>
			<br /><br />
			<center><button type="submit" name="btn_submit" style="width:30%;">Conversion</button></center>
			<br />
			
		</div>

	</form>
</div>



<?php
if(ISSET($_POST['btn_submit'])){
	$digit = $_POST['txt_digit'];
	$currency = $_POST['currency'];
	if($digit != ""){
		switch($currency){
			case "Dollar americain":
				$output = $digit * 18258.80;
				echo"<center><label class='text-success' style='font-size:25px;'>$".$output."</label></center>";
			break;
			
			case "Livre Sterling":
				$output = $digit * 15031.0.1;
				echo"<center><label class='text-success' style='font-size:25px;'>£".$output."</label></center>";
			break;
			
			case "Euro":
				$output = $digit * 16944.85;
				echo"<center><label class='text-success' style='font-size:25px;'>&#8383;".$output."</label></center>";
			break;
			
			case "Dollar australien":
				$output = $digit * 26430.05;
				echo"<center><label class='text-success' style='font-size:25px;'>&#165;".$output."</label></center>";
			break;
			
			case "Yen japonais":
				$output = $digit * 2385243.19;
				echo"<center><label class='text-success' style='font-size:25px;'>&#165;".$output."</label></center>";
			break;
		}
	}
}




$page_content = ob_get_clean();

?>

