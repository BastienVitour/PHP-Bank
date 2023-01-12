<?php

require_once __DIR__ . "/../../src/init.php";

if (empty($_POST['sum']) || empty($_POST['email'])) {
    error_die('Veuillez remplir tous les champs' , '/?page=operations/transaction');
}

$userExists = $userManager->getByEmail($_POST['email']);
if ($userExists === false) {
    error_die('Cet utilisateur n\'existe pas', '/?page=operations/transaction');
}

$stmh = $db->prepare('SELECT * FROM users WHERE email=?');
$stmh->execute([$_POST['email']]);
$utilisateur = $stmh->fetch();

if ($utilisateur['role'] < 10) {
    error_die('Vous ne pouvez pas envoyer d\'argent à cet utilisateur', '/?page=operations/transaction');
}

$stmh = $db->prepare('SELECT * FROM bankaccounts WHERE id_user = ?');
$stmh->execute([$_SESSION['user_id']]);
$user_withdraw = $stmh->fetch();

$money_usr = intval($_POST['sum']);
$new_money = $user_withdraw['money'] - $money_usr;

$stmh = $db->prepare('UPDATE bankaccounts SET money = ? WHERE id_user = ?');
$stmh->execute([$new_money, $_SESSION['user_id']]);

$stmh = $db->prepare('SELECT * FROM bankaccounts WHERE id_user = ?');
$stmh->execute([$utilisateur['id']]);
$user_deposit = $stmh->fetch();

//$money_usr = intval($_POST['deposit']);
$new_money = $user_deposit['money'] + $money_usr;

$stmh = $db->prepare('UPDATE bankaccounts SET money = ? WHERE id_user = ?');
$stmh->execute([$new_money, $utilisateur['id']]);

header('Location: /?page=operations/transaction');