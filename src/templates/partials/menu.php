<ul>
    <li><a href="/?page=home">Home</a></li>
    
    <?php if ($user === false) { ?>
        <li><a href="/?page=signup">SignUp</a></li>
        <li><a href="/?page=login">Login</a></li>
    <?php } else { ?>
        <li><?=$user->email;?></li>
        <li><a href="/?page=operations">Opérations</a></li>
        <li><a href="/actions/logout.php">Logout</a></li>
<?php    } ?>
   
    <!--<li><a href="/?page=operations/conversion">Conversion de monnaies</a></li>
    <li><a href="/?page=admin_contact">Admin Contact</a></li>
    <li><a href="/?page=contact">Contact</a></li>-->
</ul>