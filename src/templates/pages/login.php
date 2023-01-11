<?php 

$page_title = "Connexion";

$head_metas = "<link rel=stylesheet href=assets/CSS/".$page_title.".css";

ob_start();

?>

<h1>Connexion</h1>

<?php
include_once __DIR__ . '/../partials/alert_errors.php';
include_once __DIR__ . '/../partials/alert_success.php';

?>

<form action="/actions/login.php" method="post">

    <div>
        <label for="email">Email</label>
        <input type="text" id="email" name="email">
    </div>
    <div>
        <label for="password">Mot de Passe</label>
        <input type="password" id="password" name="password">
    </div>

    <button type="submit">Login</button>

</form>

<?php

$page_content = ob_get_clean();
