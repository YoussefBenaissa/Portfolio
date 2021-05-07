/*$("#form").submit(function (event) {
  //quand un evenement est déclenché (submit), on aura un param automatique (dans cet exemple on l'a nommé event)
  event.preventDefault(); // empeche l'evenement de son comportement par defaut (comportement par defaut d'un form est la soumission des données, si on le prive de ça, aucune donnée ne sera transmise)

  alert("test");
});*/

typesTab = {
  nom: /^[a-zA-z\s\p{L}]{2,}$/u,
  prenom: /^[a-zA-z\s\p{L}]{2,}$/u,
  tel: /^[0-9]{8,}$/,
  photo: /^[\w]{2,}(.jpg|.jpeg|.png|.gif)$/,
  test: /^[a-zA-Z]+$/,
  id: /[\d]+/,
};

function validation(str, type) {
  console.log(str);
  console.log(type);

  let valide = false;
  if (typesTab[type].test(str)) {
    valide = true;
  }
  valide === true
    ? (message = "")
    : (message = "Le champ " + type + " n'est pas au format demandé.<br/>");
  errorsTab = [valide, message];
  return errorsTab;
}

function valider(donnees, types, e) {
  erreurs = "";

  for (i = 0; i < donnees.length; i++) {
    tab = validation(donnees[i], types[i]);
    if (!tab[0]) {
      erreurs += tab[1];
    }
  }
  $("#erreurs").empty();
  if (erreurs) {
    const html =
      '<div class="alert alert-danger" role="alert"> ' + erreurs + "</div>";
    $("#erreurs").html(html);
    e.preventDefault();
  }
}

$("#form").submit(function (e) {
  let donnees = [$("#nom").val(), $("#prenom").val(), $("#tel").val()];
  let types = ["nom", "prenom", "tel"];
  valider(donnees, types, e);
});
$("#form2").submit(function (e) {
  e.preventDefault();
  let donnees = [
    $("#id").val(),
    $("#nom2").val(),
    $("#prenom2").val(),
    $("#tel2").val(),
  ];
  let types = ["id", "nom", "prenom", "tel"];
  valider(donnees, types, e);
  let donneesForm = $(this).serializeArray(); // cette fontion retourne un tab de la forme  Object { name: "id", value: "11" }
  console.log(donneesForm);
  data= tabToObject(donneesForm);
  
});

/*explication

1- je recupere les valeurs des champs de form que je veux controller
$("#nom").val()
$("#nom") : l id de l'input
la fonction val()  (sans param) recupère sa valeur
NB : pour modifier la val d'un champ input, on utilise la meme fonction mais avec un param qui sera la valeur qui lui sera affectée
exp : si je veux changer la val de cet input, je fais comme ceci
$("#nom").val("HIDRI");
une fois que  g récupéré les valeurs, je les met dans un tab donnees
2- ensuite je crée un tab types dans lequel je v mettre les types correspondants
3- on appelle la fonction valider qui va tester la correspondance de chacune des val du tab donnees par rapport à ce que lui correspond comme type dans le tab types
elle va parcourir les tab en parallèle et tester la correspondance entre chaque element et le type associé
exp
$("#nom").val() ==> "nom"
$("#prenom").val() ==> "prenom"
$("#tel").val() ==> "tel"
ellle gere aussi l'affcihage des erreurs (on va le voir ci-dessous)
4- on explique le fonctionnement interne de la fonction valider()
dans la fonction valider, on commence par parcourir les deux tab (donnees et types) en parallèle
pour chaque element de données, on utilise la fonction validation() pour tester sa conformité au type en question dans le tab types
$("#nom").val() ==> "nom"
$("#prenom").val() ==> "prenom"
$("#tel").val() ==> "tel"
NB : la fonction validation retourne un tab (indexé) au format [valide, message]
valide (boolean) : pour dire si la val du champ de form est conforme au type associé ou pas
message (cad message d'erreur) : vide si c conforme, message d'erreur sinon
fonctionnement de la fonction validation()
elle prend deux param (la val et le type)
on initialise la var valide à false
ensuite on teste la conformité de la valeur par rapport au type en fonction de la regex associéé dans l'objet json typesTab
NB : les objets json peuvent etre consiérées et accessibles comme des tab associatifs
exp
typesTab = {
  nom: /^[a-zA-z\s\p{L}]{2,}$/u,
  prenom: /^[a-zA-z\s\p{L}]{2,}$/u,
  tel: /^[0-9]{8,}$/,
  photo: /^[\w]{2,}(.jpg|.jpeg|.png|.gif)$/,
  test: /^[a-zA-Z]+$/,
};
pour accéder à la regex du nom, on fait :
typesTab ['nom']
et comme le type est passé en param, on puet y accéder d'une façon dynamique
typesTab [type]
on utilise la fonction test() pour tester la conformité
dont la syntaxe est :
regex.test(chaine)
si c'est valide, on met la var valide à true
ensuite on teste si la valeur de la var valide=== true, le message d'erreur sera vide (""    pas d'espace !!!   IMPORTANT)
sinon il aure le message d'erreur
test avec l operateur ternaire
valide === true ? (message = "") : (message = "Le champ " + type + "  n'est pas au format demandé.<br/>");
enfin je retourne un tab indexé qui contient le contenu de la var valide ainsi que le messge (vide ou avec message d'erreur)
on revient à la fonction valider, apres appel de la fonction validation()
le resultat de la fonction validation est un tab, on l'affecte à la var tab
tab sera de cette structure : [valide, message]
valide === true ? (message = "") : (message = "Le champ " + type + "  n'est pas au format demandé.<br/>");
enfin je retourne un tab indexé qui contient le contenu de la var valide ainsi que le messge (vide ou avec message d'erreur)
on revient à la fonction valider, apres appel de la fonction validation()
le resultat de la fonction validation est un tab, on l'affecte à la var tab
ta sera de cette structure : [valide, message]
je teste si tab[0] n'est pas vrai
NB : tab =  [valide, message]  ==> donc tab[0] est egal au contenu de la var valide (true ou false)
!tab[0] signifie si tab[0] n'est pas vrai
! : opérateur de negation
tab[0] ==> signifie si tab[0] == true
!tab[0] signifie si tab[0] n'est pas egal à true
if (!tab[0]) {
      erreurs += tab[1];
    }

si tab [0] n'est pas vrai, donc g une erreur, le message d'erreur se trouve dans tab [1]
car tab est format [valide, message]
dans ce cas (cad que j'ai des erreurs ), je les concatène dans la var erreurs
et je fais tt mon traitement à toutes les cases des tab donnees et types
(dans une boucle for)

5- dans la vue, on ajoute une div qui un id erreurs au dessus de la balise form
<div id="erreurs"></div>
6-
if (erreurs) {
    const html =
      '<div class="alert alert-danger" role="alert"> ' + erreurs + "</div>";
    $("#erreurs").html(html);
    e.preventDefault();
  }

je teste, si apres le parcours des deux tab, j'ai eu des erreurs, dans ce cas , je genere le contenu html d'une lerte BS et je le met dans la var html
ensuite, je mets ce contenu généré (alerte) dans la div qui a l'id erreur
7- j'empeche le form de son comportment par defaut (soumission des données)  ==> pas de transmission, et on reste sur la meme page

*/

$(".supp-user").click(function () {
  $(".lien-supp").attr("href", "DeleteProfil.php?id=" + $(this).attr("id"));
});
// Modif User
$(".modif-user").click(function (e) {
  e.preventDefault();
  let request = $.ajax({
    type: "GET",
    url: $(this).attr("href"),
    dataType: "html",
  });

  request.done(function (reponse) {
    $(".modal-modif .modal-body").html(reponse); // utiliser la console log pour visualiser le retour de la requette
  });

  request.fail(function (http_error) {
    //Code à jouer en cas d'éxécution en erreur du script du PHP

    let server_msg = http_error.responseText;
    let code = http_error.status;
    let code_label = http_error.statusText;
    alert("Erreur " + code + " (" + code_label + ") : " + server_msg);
  });
});
//Suprimer User
$(".lien-supp").click(function (e) {
  e.preventDefault();

  let request = $.ajax({
    type: "GET",
    url: $(this).attr("href"),
    dataType: "html",
  });

  request.done(function (reponse) {
    $(".annuler").trigger("click"); //je génère un clic artficiel sur le bouton annuler $(".annuler").click(); cette methode marche aussi
    listeUsers();
  });
  request.fail(function (http_error) {
    //Code à jouer en cas d'éxécution en erreur du script du PHP

    let server_msg = http_error.responseText;
    let code = http_error.status;
    let code_label = http_error.statusText;
    alert("Erreur " + code + " (" + code_label + ") : " + server_msg);
  });
});
// LISTEUSER()
function listeUsers() {
  let request = $.ajax({
    type: "GET",
    url: "ListeUsers.php",
    dataType: "html",
  });

  request.done(function (response) {
    $("body").html(response);
  });

  request.fail(function (http_error) {
    let server_msg = http_error.responseText;
    let code = http_error.status;
    let code_label = http_error.statusText;
    alert("Erreur " + code + " (" + code_label + ") : " + server_msg);
  });
}
//FORMMODIF

function formmodif(data) {
  let request = $.ajax({
    type: "POST",
    url: "ModifProfil.php",
    data: data,
    //Rq importante : ne faites pas la confusion entre le format json d'envoi de données et le type de retour
    //format d'envoi de données : tjr objet json
    dataType: "html",
    //dataType : le format de la reponse du serveur (reception)
  });

  request.done(function (response) {
    console.log(response);
  });

  request.fail(function (http_error) {
    let server_msg = http_error.responseText;
    let code = http_error.status;
    let code_label = http_error.statusText;
    alert("Erreur " + code + " (" + code_label + ") : " + server_msg);
  });
}
//function pour transformer notre tab en objet avec les bonnes cles:
function tabToObject(tab) {
  obj = {};

  for (i = 0; i < tab.length; i++) {
    cle = tab[i].name;
    valeur = tab[i].value;
    obj[cle] = valeur;
  }
  //pour ajouter des elements à notre obj, on utilise la syntaxe obj.cle=valeur;expemple : obj.numSecu = 46495565;

  return obj;
}
