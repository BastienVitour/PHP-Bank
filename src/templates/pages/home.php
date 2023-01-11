<?php 

$page_title = "Accueil - MonSite.com";

//$niceData = htmlspecialchars("Bonjour je tente une piraterie <script>alert('hacked')</script>");
//$badData = "Bonjour je tente une piraterie <script>alert('hacked')</script>";

ob_start();

?>

<h1>Titre de la page d'accueil</h1>

<?php

$page_content = ob_get_clean();

//script de la page home
ob_start();

$page_scripts = ob_get_clean();
