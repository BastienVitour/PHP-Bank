<?php

require_once __DIR__ . '/../../src/init.php';

/*if (!isset($_POST['fullname'], $_POST['email'], $_POST['password'], $_POST['cpassword'])) {
    error_die('Erreur du formulaire', '/?page=signup');
    show_error();
}*/

if (empty($_POST['fullname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['cpassword'])) {
    error_die('Veuillez remplir tous les champs', '/?page=signup');
}

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
    error_die('Email non valide.', '/?page=signup');
}

if (strlen($_POST['password']) < 8) {
    error_die('Mot de passe trop court', '/?page=signup');
}

if ($_POST['password'] != $_POST['cpassword']) {
    error_die('Les deux mots de passe sont différents', '/?page=signup');
}

$alreadyUser = $userManager->getByEmail($_POST['email']);
if ($alreadyUser !== false) {
    error_die('Déjà inscrit', '/?page=signup');
}

$user = User::create($_POST['fullname'], $_POST['email'], $_POST['password'], 1, $_SERVER['REMOTE_ADDR']);
$userId = $userManager->insert($user);

$account = Account::createAccount($userId, 0, 1);
$accountId = $accountManager->insertAccount($account);

$_SESSION['user_id'] = $userId;
$_SESSION['account_id'] = $accountId;

header('Location: /?page=home');