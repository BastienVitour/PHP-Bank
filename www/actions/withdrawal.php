<?php

require_once __DIR__ . "/../../src/init.php";

if ($_POST['retrait'] == "0") {
    error_die('Aucune somme n\'a été selectionnée' , '/?page=operations/withdrawal');
}

$stmh = $db->prepare('SELECT * FROM bankaccounts WHERE id_user = ?');
$stmh->execute([$_SESSION['user_id']]);
$usr_withdrawal = $stmh->fetch();

if ($user->role >= 200) {
    $operationManager->withdraw($_SESSION['user_id'], $_POST['retrait']);
    $operation_withdrawal = Operation::createBankOp($usr_withdrawal['id'], $_POST['retrait'], 1, 100);
    $opId = $operationManager->insertBankOp($operation_withdrawal, 'withdrawals');
}
else {
    $operation_withdrawal = Operation::createBankOp($usr_withdrawal['id'], $_POST['retrait'], 1, 50);
    $opId = $operationManager->insertBankOp($operation_withdrawal, 'withdrawals');
}

//$operation_deposit = Operation::createBankOp($usr_deposit['id'], $_POST['retrait'], 1, 50);
//$opId = $operationManager->insertBankOp($operation_deposit, 'withdrawals');

header('Location: /?page=operations/withdraw');