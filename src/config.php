<?php

$config = [];
$config['db'] = [
    'host' => 'localhost',
    'name' => 'PHP_Bank',
    'user' => 'root',
    'pass' => 'root',
    'port' => 8888
];

$config['roles'] = [
    0 => "Utilisateur Banni",
    1 => "Utilisateur Non-Vérifié",
    10 => "Utilisateur Vérifié",
    200 => "Manager",
    1000 => "Admin"
];