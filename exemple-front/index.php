<?php
include "lib/init.php"
;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= getContenu("TITLE") ?></title>
        <description><?= getContenu("DESC") ?></description>
    </head>
    <body>
        <h1 class="<?= getContenu("COUL_TIT_ACC") ?>"><?= getContenu("TIT_ACC") ?></h1>
        <img src="img/<?= getContenu("IMG1_ACC") ?>" alt="<?= getContenu("IMG1_ACC_ALT") ?>"/>
    </body>
</html>
