<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Euro convertiseur</h3>
		<hr style="border-top:1px dotted #000;"/>
		<form method="GET" action="">
			<div class="form-inline">
				<label>Euro:</label>
				<input class="form-control" type="text" name="txt_digit"/>
				<label>Select Currency: </label>
				<select name="currency" class="form-control">
					<option value="">Select an option</option>
					<option value="Dollar American">Dollar american</option>
					<option value="livre steling">livre sterling</option>
					<option value="Dollar canadien">Dollar canadien</option>
					<option value="Dollar australien">Dollar australien</option>
					<option value="yen japonais">yen japonais</option>
				</select>
				<br /><br />
				<center><button type="submit" name="btn_submit" class="btn btn-primary form-control" style="width:30%;">Convert</button></center>
				<br />
				<?php require 'convert.php'?>
			</div>
		</form>
	</div>
</body>
</html>