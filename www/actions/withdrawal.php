<?php

require_once __DIR__ . "/../../src/init.php";

if ($_POST['retrait'] == "0") {
    error_die('Aucune somme n\'a été selectionnée' , '/?page=operations/withdrawal');
}

$stmh = $db->prepare('SELECT * FROM bankaccounts WHERE id_user = ?');
$stmh->execute([$_SESSION['user_id']]);
$usr_deposit = $stmh->fetch();

$operation_deposit = Operation::createBankOp($usr_deposit['id'], $_POST['retrait'], 1, 50);
$opId = $operationManager->insertBankOp($operation_deposit, 'withdrawals');

header('Location: /?page=operations/withdraw');