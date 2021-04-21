<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>CreationSoc</title>
</head>
<?php
require_once "../model/ModelTypeRef.php";
require_once "../view/ViewTypeRef.php";
require_once "../view/ViewTemplate.php";
ViewTemplate::menu();
if (isset($_POST['ajouter'])) { // ajout fait reférence au name du bouton valider 
    ModeleTypeRef::EnvoieTypeRef($_POST['type_ref'],$_POST['support']);
    ViewTemplate::alert("Creation reussie", "success", "ListeTypeRef.php");
} else {
    ViewTypeRef::ajoutRef();
};
ViewTemplate::footer();
?>

<body>
    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/all.min.js"></script>
</body>

</html>