<!DOCTYPE html>
<?php
// https://www.google.com/recaptcha
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inscription</title>
    </head>
    <body>
        <pre>
        <?php
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        // Aspect du $_POST
        print_r($_POST);

        // On récupère la réponse du captcha
        $code=$_POST["g-recaptcha-response"];
        $key="6LdR16gUAAAAAPJXpeTf9mqjklzweHRnjx_u3gk5";    // Clé secrète

        $api = curl_init("https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($api,CURLOPT_POST, true);
        curl_setopt($api,CURLOPT_POSTFIELDS, ["secret" => $key, "response"=>"x".$code]);
        curl_setopt($api,CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($api);
        $tab = json_decode($json,true);
        echo $json."\n\n";
        print_r($tab);

        if ($tab["success"]) {
            // Le formulaire est envoyé par un humain
            echo "Bravo, vous êtes humain !";
        }


        ?>
        </pre>
    </body>
</html>
