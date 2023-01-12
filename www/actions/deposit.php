<?php

require_once __DIR__ . "/../../src/init.php";

if ($_POST['deposit'] == "0") {
    error_die('Aucune somme n\'a été selectionnée' , '/?page=operations/deposit');
}

$stmh = $db->prepare('SELECT * FROM bankaccounts WHERE id_user = ?');
$stmh->execute([$_SESSION['user_id']]);
$utilisateur = $stmh->fetch();

$money_usr = intval($_POST['deposit']);
$new_money = $utilisateur['money'] + $money_usr;

$stmh = $db->prepare('UPDATE bankaccounts SET money = ? WHERE id = ?');
$stmh->execute([$new_money, $utilisateur['id']]);

header('Location: /?page=operations/deposit');