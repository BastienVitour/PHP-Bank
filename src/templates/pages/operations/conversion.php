<?php

$page_title = "Conversion de monnaies";

ob_start();

?>

<nav >
	<div>
		
	</div>
</nav>
<div></div>
<div>
	<h3 >Euro convertiseur</h3>
	<hr style="border-top:1px dotted #000;"/>
	<form method="POST" action="">
		<div >
			<label>Euro:</label>
			<input type="text" name="txt_digit"/>
			<label>Choix de la monnaie : </label>
			<select name="currency" class="form-control">
				<option value="">Selection de la monnaie</option>
				<option value="Dollar americain">Dollar americain</option>
				<option value="Livre Sterling">Livre Sterling</option>
				<option value="Bitcoin">Bitcoin</option>
				<option value="Dollar australien">Dollar australien</option>
				<option value="Yen japonais">Yen japonais</option>
			</select>
			<br /><br />
			<center><button type="submit" name="btn_submit" class="btn btn-primary form-control" style="width:30%;">Conversion</button></center>
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
				$output = $digit * 1.074;
				echo"<center><label class='text-success' style='font-size:25px;'>$".$output."</label></center>";
			break;
			
			case "Livre Sterling":
				$output = $digit * 0.89;
				echo"<center><label class='text-success' style='font-size:25px;'>£".$output."</label></center>";
			break;
			
			case "Bitcoin":
				$output = $digit * 0.000059;
				echo"<center><label class='text-success' style='font-size:25px;'>&#8383".$output."</label></center>";
			break;
			
			case "Dollar australien":
				$output = $digit * 1.56;
				echo"<center><label class='text-success' style='font-size:25px;'>&#165".$output."</label></center>";
			break;
			
			case "Yen japonais":
				$output = $digit * 142.6;
				echo"<center><label class='text-success' style='font-size:25px;'>&#165".$output."</label></center>";
			break;
		}
	}
}

$page_content = ob_get_clean();

?>
