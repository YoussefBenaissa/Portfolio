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
    require_once "../view/ViewReference.php";
    require_once "../model/ModelReference.php";
    ViewTemplate::menu();

    if (isset($_POST['ajout'])) { // ajout fait reférence au name du bouton valider 
        ModelReference::EnvoieReference(1, $_POST['type_ref_id'], $_POST['nom'], $_POST['techno'], $_POST['contributeurs'], $_POST['lien']); // ici l'userID est en dur est donc si je veux manipuler l'utilisateur 1 je doit mettre 1
        ViewTemplate::alert("Creation reussie", "success", "CreationReference.php");
    } else {
        ViewReference::ajoutRef();
    };
    viewTemplate::footer();



    
    ?>

    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/all.min.js"></script>
</body>

</html>