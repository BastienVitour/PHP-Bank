<?php

$page_title = "Conversion du Dollar";

ob_start();

?>

<nav >
	<div>
		
	</div>
</nav>
<div></div>
<div>
	<h3 >convertiseur du Dollar</h3>
	<hr style="border-top:1px dotted #000;"/>
	<form method="POST" action="">
		<div>
			<label >Dollar:</label>
			<input type="text" name="txt_digit"/>
			<label>Choix de la monnaie : </label>
			<select name="currency">
				<option value="">Selection de la monnaie</option>
				<option value="Euro">Euro</option>
				<option value="Livre Sterling">Livre Sterling</option>
				<option value="Bitcoin">Bitcoin</option>
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
			case "Euro":
				$output = $digit * 0.92;
				echo"<center><label class='text-success' style='font-size:25px;'>€".$output."</label></center>";
			break;
			
			case "Livre Sterling":
				$output = $digit * 0.82;
				echo"<center><label class='text-success' style='font-size:25px;'>£".$output."</label></center>";
			break;
			
			case "Bitcoin":
				$output = $digit * 0.000055;
				echo"<center><label class='text-success' style='font-size:25px;'>&#8383;".$output."</label></center>";
			break;
			
			case "Dollar australien":
				$output = $digit * 1.45;
				echo"<center><label class='text-success' style='font-size:25px;'>$;".$output."</label></center>";
			break;
			
			case "Yen japonais":
				$output = $digit * 130.54;
				echo"<center><label class='text-success' style='font-size:25px;'>&#165;".$output."</label></center>";
			break;
		}
	}
}




$page_content = ob_get_clean();

?>

