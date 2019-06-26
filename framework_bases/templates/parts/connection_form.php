<?php

if (!isset($_SESSION["login"])){
    echo "<form method='POST' action='?model=session&action=checkLogin'>";
    echo "<label for='login'>Saisissez votre identifiant>";
    echo "<input type='text' name='login'>";
    echo"<label for='password'>Saissiez votre mot de passe</label>";
    echo "<input type='password' name='password'>";
    echo "<input type='submit' value='Se connecter'>";
    echo "</form>";
}

