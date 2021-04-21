<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>test</title>
</head>

<body>
    <?php
    require_once "../view/ViewTemplate.php";
    require_once "../view/ViewSocial.php";
    require_once "../model/ModelSocial.php";
    ViewTemplate::menu();

    if (isset($_POST['ajout'])) { // ajout fait reférence au name du bouton valider 
        ModelSocial::ajoutSocial(1, $_POST['type_soc_id'], $_POST['lien']); // ici l'userID est en dur est donc si je veux manipuler l'utilisateur 1 je doit mettre 1
        ViewTemplate::alert("Creation reussie", "success", "ListeRS.php");
    } else {
        ViewSocial::ajoutSocial();
    };
    viewTemplate::footer();
    ?>

    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/all.min.js"></script>
</body>

</html>