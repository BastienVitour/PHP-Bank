<?php

require_once __DIR__ . "/../../src/init.php";

//Pour les dépôts
if (isset($_POST['accept_d'])) {
    if (!empty($_POST['select_d'])) {

        $things = explode(",", $_POST['select_d']);

        $stmh = $db->prepare('SELECT * FROM deposits WHERE id = ?');
        $stmh->execute([$_POST['select_d']]);
        $utilisateur = $stmh->fetch();
        
        $operationManager->deposit($things[0], $utilisateur['value']);

        $stmh = $db->prepare('UPDATE deposits SET status=100 WHERE id=? AND status=50');
        $stmh->execute([
            $things[1]
        ]);
    }
    else {
        error_die('Veuillez sélectionner une opération',  '/?page=operation_verification');
    }
}

if (isset($_POST['deny_d'])) {
    if (!empty($_POST['select_d'])) {

        $things = explode(",", $_POST['select_d']);

        $stmh = $db->prepare('UPDATE deposits SET status=0 WHERE id=? AND status=50');
        $stmh->execute([
            $things[1]
        ]);
    }
    
    else {
        error_die('Veuillez sélectionner une opération',  '/?page=operation_verification');
    }
}


//Pour les retraits
if (isset($_POST['accept_w'])) {
    if (!empty($_POST['select_w'])) {

        $things = explode(",", $_POST['select_w']);

        $stmh = $db->prepare('SELECT * FROM withdrawals WHERE id = ?');
        $stmh->execute($things[0]);
        $utilisateur = $stmh->fetch();
        
        $operationManager->withdraw($_POST['select_w'], $utilisateur['value']);

        $stmh = $db->prepare('UPDATE withdrawals SET status=100 WHERE id=?');
        $stmh->execute([
            $things[1]
        ]);
    }
    else {
        error_die('Veuillez sélectionner une opération',  '/?page=operation_verification');
    }
}

if (isset($_POST['deny_w'])) {
    if (!empty($_POST['select_w'])) {

        $things = explode(",", $_POST['select_w']);

        $stmh = $db->prepare('UPDATE withdrawals SET status=0 WHERE id=?');
        $stmh->execute([
            $things[1]
        ]);
    }
    
    else {
        error_die('Veuillez sélectionner une opération',  '/?page=operation_verification');
    }
}

header('Location: /?page=operation_verification');
