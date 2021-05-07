<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/all.min.css" />
    <link rel="stylesheet" href="../../css/styles.css" />
    <title>modifuser</title>
</head>

<body>
    <?php
    define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']); //ca definit une constante qui s'appelle ROOT_DIR et qui a la valeur  $_SERVER['DOCUMENT_ROOT'] &  $_SERVER['DOCUMENT_ROOT'] nous renvoie le chemin vers le dossier racine de notre projet 
    require_once ROOT_DIR . "/classes/view/ViewUser.php";
    require_once ROOT_DIR . "/classes/model/ModelUser.php";
    require_once ROOT_DIR . "/classes/view/ViewTemplate.php";
    require_once ROOT_DIR . "/classes/utils/Utils.php";
    // ViewTemplate::menu();



    if (isset($_GET['id'])) {
        if (ModelUser::getUser($_GET['id'])) {
            ViewUser::modifForm($_GET['id']);
        } else {
            ViewTemplate::alert("L'utilisateur n'existe pas.", "danger", "ListeUser.php");
        }
    } else {
        if (isset($_POST['modif'])) {
            if (isset($_POST['id']) && ModelUser::getUser($_POST['id'])) {
                $donnees = [$_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['tel'], $_POST['adresse'], $_POST['photo'], $_POST['description']];
                $types = ["id", "nom", "prenom", "email", "tel", "non", "photo", "non"];
                $data = Utils::valider($donnees, $types);
                if ($data) {
                    $file_name = $data[6];

                    if (!empty($_FILES['fichier']['name'])) {
                        $extensions = ["jpg", "jpeg", "png", "gif"];
                        $upload = Utils::upload($extensions, $_FILES['fichier']);
                        if ($upload['uploadOk']) {
                            $file_name = $upload['file_name'];
                            if (file_exists(ROOT_DIR . "/uploads/$data[6]")) {
                                unlink(ROOT_DIR . "/uploads/$data[6]");
                            }
                        } else {
                            ViewTemplate::alert($upload['errors'], "danger", htmlspecialchars($_SERVER['PHP_SELF']));
                        }
                    }
                    ModelUser::ModifProfil($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $file_name, $data[7]);
                    ViewTemplate::alert("La modification a été faite avec succès.", "success", "ListeUsers.php");
                } else {
                    ViewUser::modifForm($data[0]);
                }
            } else {
                ViewTemplate::alert("Aucune donnée n'a été transmise.", "danger", "ListeUsers.php");
            }
        } else {
            ViewTemplate::alert("Aucune donnée n'a été transmise.", "danger", "ListeUsers.php");
        }
    }
    // ViewTemplate::footer();


    ?>



    <script src="../../js/jquery-3.5.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/all.min.js"></script>
</body>

</html>