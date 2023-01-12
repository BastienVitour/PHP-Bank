<?php

$page_title = "Retraits";

ob_start();

?>

<form action="/actions/withdrawal.php" method="post">
    <div>
        <label for="text">Retrait d'argent :</label>
        <select name="retrait" id="retire">
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
    <button type="submit">Retirer l'argent</button>

</form>

<?php

$page_content = ob_get_clean();