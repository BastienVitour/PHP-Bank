<?php

$page_title = "Dépôts";

ob_start();

include_once __DIR__ . '/../../partials/alert_errors.php';
include_once __DIR__ . '/../../partials/alert_success.php';

?>

<form action="/actions/deposit.php" method="post" >
    <div>
        <label for="text">Déposer de l'argent :</label>
        <select name="deposit" id="depot">
            <option value="0">--</option>
            <option value="20">20€</option>
            <option value="40">40€</option>
            <option value="50">50€</option>
            <option value="60">60€</option>
            <option value="80">80€</option>
            <option value="100">100€</option>
        </select>
    </div>
    <br>
    <div>
        <label for="">Somme autre :</label>
        <input type="number">
    </div>
    <br>
    <button type="submit">Déposer l'argent</button>

</form>

<?php

$page_content = ob_get_clean();
