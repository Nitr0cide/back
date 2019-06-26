<?php

//   Programme de test : hashage d'un mot de passe (pasé en GET, paramètre password)

$password = $_GET["password"];

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        Le mot de passe hashé pour <?= $password ?> est : <?= password_hash($password, PASSWORD_DEFAULT) ?>
    </body>
</html>
