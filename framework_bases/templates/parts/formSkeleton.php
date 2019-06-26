<?php 

// Template, page complète : formulaire de saisie d'un objet
//      $obj : objet de la classe concernée, chargé ou non
//      $mode : mode create / modif


if (isset($_GET["id"])){
    $mode = 1;   // Modification
} else {
    $mode = 0;  // Création
}
echo " MODE : ".$mode;
?>
    
        <form method="POST" action='?model=<?= $this->table ?>&action=set<?= isset($_GET["id"]) ? "&id=".$_GET["id"] : '' ?>'>
            <?php
                
                
            // On affiche le formulaire
                foreach($this->champs as $key => $value){
                    // On gère une exception 
                    if ($this->table === "utilisateurs"){
                        if ($key === "actif"){
                            break;
                        }
                    }
                    $this->makeForm($key, $mode);   
                }
                
                
                echo "<input type='submit' value='Terminer'>";
            ?>
        </form>

