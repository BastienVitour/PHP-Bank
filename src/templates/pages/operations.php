<?php 

require_once __DIR__ . '/../../init.php';

$page_title = "Opérations";

ob_start();

?>

<h1>Liste des opérations</h1>

<li><a href="/?page=operations/deposit">Dépôt d'argent</a></li>
<li><a href="/?page=operations/withdraw">Retrait d'argent</a></li>
<li><a href="/?page=operations/transaction">Envoi d'argent</a></li>
<li><a href="/?page=operations/conversion">Conversion de monnaies</a></li>

<?php

$page_content = ob_get_clean();
