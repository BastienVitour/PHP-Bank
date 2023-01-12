<?php 

require_once __DIR__ . '/../../init.php';

$page_title = "Profile";

ob_start();

?>

<h1>Profil</h1>

<?php

if ($user->role == 0) { ?>

    <h2>Votre compte a été banni</h2>

<?php }

$page_content = ob_get_clean();
