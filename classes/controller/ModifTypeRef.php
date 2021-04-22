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
if (isset($_GET['id'])) {
    if (ModeleTypeRef::getRef($_GET['id'])) {
        ViewTypeRef::modifTypeRef($_GET['id']);
    } else {
        ViewTemplate::alert("Le type de ref n'existe pas.", "danger", "ListeTypeRef.php");
    }
} else {
    if (isset($_POST['modif'])) {
        if (isset($_POST['id']) && ModeleTypeRef::getRef($_POST['id'])) {
            ModeleTypeRef::ModifTypeRef($_POST['id'], $_POST['type_ref'], $_POST['support']);
            ViewTemplate::alert("La modification a été faite avec succès.", "success", "ListeTypeRef.php");
        } else {
            ViewTemplate::alert("Aucun type n'a été transmis.", "danger", "ListeTypeRef.php");
        }
    } else {
        ViewTemplate::alert("Aucun type n'a été transmis.", "danger", "ListeTypeRef.php");
    }
}

ViewTemplate::footer();

?>

<body>
    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/all.min.js"></script>
</body>

</html>