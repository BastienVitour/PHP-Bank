<?php

require_once __DIR__ . "/../../src/init.php";


$stmh = $db->prepare('SELECT money, id FROM bankaccounts WHERE id_user = ?');
$stmh->execute([$utilisateur['id']]);
$actual_money = $stmh->fetch();

$stmh = $db->prepare('SELECT name FROM currencies WHERE id_currencies = ?');
$stmh->execute([$utilisateur['id']]);
$actual_currencie = $stmh->fetch();