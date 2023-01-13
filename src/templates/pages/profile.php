<?php 

require_once __DIR__ . '/../../init.php';

$page_title = "Profile";

ob_start();

?>

<h1>Profil</h1>

<?php

if ($user != false) {

    if ($user->role == 1) { ?>

        <h3>Votre compte est en cours de vérification par un administrateur</h3>
    
    <?php } else if ($user->role > 1){ 
        
        $stmh = $db->prepare('SELECT money, id FROM bankaccounts WHERE id_user = ?');
        $stmh->execute([$_SESSION['user_id']]);
        $actual_money = $stmh->fetch();
        
        $stmh = $db->prepare('SELECT name FROM currencies WHERE id = 1');
        $stmh->execute();
        $actual_currency = $stmh->fetch();
        ?>

        <h3>Votre compte en banque : <? $actual_money . $actual_currencie ?> </h3>

        <p>Vous avez <?=$actual_money['money']?> <?=$actual_currency['name']?> sur votre compte</p>

    <?php } 
    
        $stmh = $db->prepare('SELECT * FROM deposits WHERE id_user = ?');
        $stmh->execute([$_SESSION['user_id']]);
        $last_depot = $stmh->fetch();
        
        $stmh = $db->prepare('SELECT * FROM withdrawal WHERE id_user = ?');
        $stmh->execute([$_SESSION['user_id']]);
        $last_withdrawal = $stmh->fetch();

        $tabl = $db->prepare("SELECT date1, SUM(deposits.column1) as column1_sum, SUM(withdrawal.column2) as column2_sum, SUM(transactions.column3) as column3_sum
        FROM deposits
        JOIN withdrawal AND transactions ON deposits.id = withdrawal.id = transactions.id
        GROUP BY date1");
       

        $stmh->execute([$_SESSION['user_id']]);
        $last_withdrawal = $stmh->fetch();
        ?>

    <table>
        <?php for($i = 0 ; $tabl >= 11 ; $i++){
            
        }?>
    </table>
        
<?php }

$page_content = ob_get_clean();
