<?php

require_once __DIR__ . "/../../src/init.php";

if ($_POST['deposit'] == "0") {
    error_die('Aucune somme n\'a été selectionnée' , '/?page=operations/deposit');
}

$stmh = $db->prepare('SELECT money FROM bankaccount WHERE id = ?');
$stmh->execute($_SESSION['user_id']);
$utilisateur = $stmh->fetch();

$utilisateur += (float)$_POST['deposit'];

$stmh = $db->prepare('UPDATE bankaccount SET money=? WHERE id_user=?');
$stmh->execute([ $utilisateur, $_SESSION['user_id']]);


