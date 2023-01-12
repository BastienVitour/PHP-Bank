<?php

require_once __DIR__ . "/../../src/init.php";

if ($_POST['deposit'] == "0") {
    error_die('Aucune somme n\'a été selectionnée' , '/?page=operations/deposit');
}

//error_die($_SESSION['user_id'], '/?page=operations/deposit');

$stmh = $db->prepare('SELECT * FROM bankaccounts WHERE id_user = ?');
$stmh->execute([$_SESSION['user_id']]);
$utilisateur = $stmh->fetch();

//error_die('salut et '.$utilisateur['money'].' puis bonjour' , '/?page=operations/deposit');

$money_usr = intval($_POST['deposit']);
$new_money = $utilisateur['money'] + $money_usr;

$stmh = $db->prepare('UPDATE bankaccounts SET money = ? WHERE id = ?');
$stmh->execute([$new_money, $utilisateur['id']]);


//var_dump($money_usr);
//var_dump($new_money, $utilisateur['id_user'], $_SESSION['user_id'], $utilisateur['money']);
//var_dump($utilisateur);
//var_dump($_POST['deposit']);

header('Location: /?page=operations/deposit');