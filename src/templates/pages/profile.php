<?php 

require_once __DIR__ . '/../../init.php';

$page_title = "Profile";

ob_start();

?>

<h1>Profil</h1>

<?php

if ($user != false) {

    if ($user->role == 1) { ?>

        <h3>Votre compte est en cours de vérification par un administrateur</h3>
    
    <?php } else if ($user->role > 1){ ?>

        <h3>Votre compte en banque : <? echo ($actual_money . $actual_currencie)?> </h3>

    <?php }
}

$page_content = ob_get_clean();
