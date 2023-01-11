<?php
session_start();

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/db.php';

//fonctions utilitaires
require_once __DIR__ . '/utils/errors.php';

//pages existantes sur notre site internet
$pages = ['home', 'contact', 'admin_contact', 'login', 'signup', 'operations', 'operations/conversion'];

//init variables vides pour le template
$head_metas = "";
$page_scripts = "";

//Inclure les classes
//require_once __DIR__ . '/class/ContactForm.php';
require_once __DIR__ . '/class/User.php';

//Inclure les managers
//require_once __DIR__ . '/class/ContactFormManager.php';
require_once __DIR__ . '/class/UserManager.php';

//Initialiser les managers
//$contactFormManager = new ContactFormManager($db);
$userManager = new UserManager($db);

//Session & Auth
$user = false;
if (isset($_SESSION['user_id'])) {
    $user = $userManager->getById($_SESSION['user_id']);
}
