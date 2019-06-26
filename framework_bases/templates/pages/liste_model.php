<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <table class='table'>
            <thead class="thead-dark">
                <tr>
                    <?php
                    foreach ($result as $object) {
                        $model = $object->table;
                        foreach ($object->champs as $key => $value) {
                            if ($key !== $object->primaryK) {
                                echo "<th scope='col'> $key </th>";
                            }
                        }
                        break;
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                 // Appelle le template qui affiche une par une toutes les informations contenues dans $result 
                 // $method = $obj->$listAll
                include "templates/parts/ligne_model.php";
                ?>
            </tbody>
        </table>
        <div style="width: 20%; margin: 0 auto;"> 
            <a class="btn btn-outline-danger w-100" href="index.php">Retour à l'accueil</a>    
        </div>

    </body>
</html>
