<?php 

require_once __DIR__ . '/../../init.php';

$page_title = "Accueil";

ob_start();

?>

<h1>Titre de la page d'accueil</h1>

<?php

echo '<p>'.var_dump($user).'</p>';

if (isset($_SESSION['user_id'])) {
    echo '<p>'.$_SESSION['user_id'].'</p>';
}

$page_content = ob_get_clean();

//script de la page home
ob_start();

$page_scripts = ob_get_clean();
