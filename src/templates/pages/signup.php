<?php 

$page_title = "Inscription";

$head_metas = "<link rel=stylesheet href=assets/CSS/".$page_title.".css";

ob_start();

?>

<h1>Inscription</h1>

<?php
include_once __DIR__ . '/../partials/alert_errors.php';
include_once __DIR__ . '/../partials/alert_success.php';
?>

<form action="/actions/signup.php" method="post" name="signup_form">

    <div>
        <label for="fullname">Votre nom complet</label>
        <input type="text" id="fullname" name="fullname">
    </div>

    <div>
        <label for="email">Email</label>
        <input type="text" id="email" name="email">
    </div>
    <div>
        <label for="password">Mot de Passe</label>
        <input type="password" id="password" name="password">
    </div>
    <div>
        <label for="cpassword">Confirmez Mot de Passe</label>
        <input type="password" id="cpassword" name="cpassword">
    </div>

    <button type="submit">Signup</button>

</form>

<?php

$page_content = ob_get_clean();
