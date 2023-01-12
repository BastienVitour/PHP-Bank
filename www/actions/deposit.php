<?php

require_once __DIR__ . "/../../src/init.php";

if ($_POST['deposit'] == "0") {
    error_die('Aucune somme n\'a été selectionnée' , '/?page=operations/deposit');
}

//$operationManager->deposit($_SESSION['user_id'], $_POST['deposit']);

$stmh = $db->prepare('SELECT * FROM bankaccounts WHERE id_user = ?');
$stmh->execute([$_SESSION['user_id']]);
$usr_deposit = $stmh->fetch();

$operation_deposit = Operation::createBankOp($usr_deposit['id'], $_POST['deposit'], 1, 50);
$opId = $operationManager->insertBankOp($operation_deposit, 'deposits');


header('Location: /?page=operations/deposit');