<?php
// Rôle : Afficher tous les éléments correspondant à une table dans la base de données
// Paramètres : un tableau de tous les objets correspondant au model
// Transforme notre tableau d'objet en tableau simple
?>


<?php
foreach ($result as $object) {
    echo "<tr>";
    foreach ($object->champs as $key => $value) {
        if ($key !== $object->primaryK) {
            echo "<td>";
            echo $object->get($key);
            echo "</td>";
        }
    }
    $id = $object->champs[$object->primaryK]["valeur"];
    echo "<td><a href='?model=$object->table&action=callForm&id=$id '>Modifier</a></td>";
    echo "<td><a href='?model=$object->table&action=delete&id=$id '>Supprimer</a></td>"; 
    echo "</tr>";
}
?>