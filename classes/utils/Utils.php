<?php

class Utils
{
    public static function upload($extenssion, $fichier)
    {


        $file_name = $fichier['name'];
        $file_size = $fichier['size'];
        $file_tmp = $fichier['tmp_name'];
        $fileExplode = explode('.', $fichier['name']);
        $file_ext = strtolower(end($fileExplode));
        $uploadOk = false;
        $errors = "";
        $pattern = "/^[\w\s\-\.]{4,}$/";
        /*$fileExplode = explode('.', $fichier['name']) : je prend le nom du fichier (chaine de caract) puis je le divise en parties dans un tab
        en fonction du diviseur (.),fileExplode  : est de type tab : exp : nom.fich.png ==> va etre transformé en tab
        nom
        ich
        png
        a chaque fois uqu il trouve un point (c'est le diviseur dans cet exemple, on peut specifier d'autre si on peut)
        end($fileExplode) : je prend la derniere case du tab dans le but de determiner l'extension
        strtolower : elle transforme l'extension en minuscule
        $uploadOk = false;    pour dire si l'upload s'est bien fait ou pas, je l'initialise à false
        $errors = "";  : j'ai besoin des differents messages d'erreurs, je l'initialise à la chaine vide
        \w   ==>  [a-zA-Z0-9_]
        \s : des espaces
        - : tiret de 6
        . : piont*/
        if (!preg_match($pattern, $file_name)) {
            $errors .= "Nom de fichier non valide. <br/>"; //on utilise .= pour la concatenation (pas de = seulement, car cela ecrase l'ancienne valeur)
        }
        if (!in_array(strtolower($file_ext), $extenssion)) {
            $errors .= "extension non autorisée. <br/>";
        }
        if ($file_size > 3000000) {
            $errors .= "taille du fichier ne doit pas dépasser 3 Mo. <br/>";
        }
        $file_name = substr(md5($file_name), 10) . ".$file_ext";




        /*4- je chiffre le nom du fichier
        $file_name = substr(md5($file_name), 10) . ".$file_ext";
        4.1 chiffrer le nom en utilisant la fonction md5
        md5($file_name)
        4.2, j'extrais les 10 premiers caract seulement
        j utilise la fonction substr ($chaine, $nb_caract)
        substr(   md5($file_name)  , 10  )
        ensuite je concatene l'extension
        4.3 j'affecte cette valeur au nom du fichier (le nv nom généré)*/
        while (file_exists(ROOT_DIR . "/uploads/$file_name")) {
            $file_name = substr(md5($file_name), 10) . ".$file_ext";
        }
        /*5- tester l'existance du fichier pour eviter d'ecraser un autre qui a le meme nom
        file_exists("../../photos/$file_name")
        syntaxe : file_exists($chemin)
        si un fichier porte le meme nom, on renomme le fichier en cours encore une fois
        jusqu'à ce qu'on obtienne un nom qui n'existe pas
        */
        if ($errors === "") {
            if (move_uploaded_file($file_tmp, ROOT_DIR . "/uploads/" . $file_name)) {
                $uploadOk = true;
                return ["uploadOk" => $uploadOk, "file_name" => $file_name, "errors" => $errors];
            } else {
                $errors .= "Echec de l'upload. <br/>";
            }
        } else {
            return ["uploadOk" => false, "file_name" => "", "errors" => "Aucun fichier n'est uploadé.<br>$errors"];
        }
    }


    public static function validation($str, $type)
    {
        $valide = false;
        //https://www.php.net/manual/fr/regexp.reference.unicode.php
        $tabRegex = [
            "id" => "/[\d]+/",
            "non" => "//",
            "test" => '/[\w]123/',
            "nom" => "/^[\p{L}\s]{2,}$/u",
            "prenom" => "/^[\p{L}\s]{2,}$/u", // le u est important il siginfie l'encodage universel et le \p{L} cest pour les caractere acentue par exemple pour stéphane
            "tel" => "/^[+]?[0-9]{8,}$/",
            "photo" => "/^[\w\s\-\.]{1,22}(.jpg|.jpeg|.png|.gif)$/",

        ];

        $str = trim(strip_tags((string)$str));

        //https://www.php.net/manual/fr/filter.filters.validate.php
        switch ($type) {
            case "email":
                if (filter_var($str, FILTER_VALIDATE_EMAIL)) { //syntaxe de la fonction filter_varfilter_var($chaine, constante_de_filtre) exp : filter_var($str, FILTER_VALIDATE_EMAIL) ==> elle teste la conformité de la chaine $chaine par rapport au filtre EMAIL
                    $valide = true;
                }
                break;
            case "url":
                if (filter_var($str, FILTER_VALIDATE_URL)) {
                    $valide = true;
                }
                break;
            case "non":
                $valide = true;
            default:
                if (preg_match($tabRegex[$type], $str)) {
                    $valide = true;
                }
        }

        $valide === true ? $message = "" : $message = "Le champ $type n'est pas au format demandé.<br/>";

        $errorsTab = [$str, $message];
        return $errorsTab;
    }

    public static function valider($donnees, $types)
    {
        $erreurs = "";
        $donneesValides = []; // donnee = str apres nettoyage 
        for ($i = 0; $i < count($donnees); $i++) {
            $tab = Utils::validation($donnees[$i], $types[$i]);
            if ($tab[1]) {
                $erreurs .= $tab[1];
            }
            $donneesValides[] = $tab[0];
        }
        if ($erreurs) {
            ViewTemplate::alert($erreurs, "danger", null);
            return false;
        }
        return
            $donneesValides;
    }
}
