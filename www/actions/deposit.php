<?php

require_once __DIR__ . "/../../src/init.php";

if ($_POST['deposit'] == "0") {
    error_die('Aucune somme n\'a été selectionnée' , '/?page=operations/deposit');
}

//$operationManager->deposit($_SESSION['user_id'], $_POST['deposit']);

$stmh = $db->prepare('SELECT * FROM bankaccounts WHERE id_user = ?');
$stmh->execute([$_SESSION['user_id']]);
$usr_deposit = $stmh->fetch();

if ($user->role >= 200) {
    $operationManager->deposit($_SESSION['user_id'], $_POST['deposit']);
    $operation_deposit = Operation::createBankOp($usr_deposit['id'], $_POST['deposit'], 100);
    $opId = $operationManager->insertBankOp($operation_deposit, 'deposits');

    $stmh = $db->prepare('SELECT id FROM deposits ORDER BY id DESC LIMIT 1');
    $stmh->execute();
    $last_id = $stmh->fetch();

    //error_die($last_id['id'] , '/?page=operations/deposit');

    $stmh = $db->prepare('UPDATE deposits SET admin_id=? WHERE id=?');
    $stmh->execute([
        $_SESSION['user_id'],
        $last_id['id']
    ]);
}
else {
    $operation_deposit = Operation::createBankOp($usr_deposit['id'], $_POST['deposit'], 50);
    $opId = $operationManager->insertBankOp($operation_deposit, 'deposits');
}


header('Location: /?page=operations/deposit');