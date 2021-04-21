<?php
require_once "connexion.php";
class ModeleTypeRef
{
    static function EnvoieTypeRef($typeref, $support)
    {
        $idcon = connexion();
        $requette = $idcon->prepare('INSERT INTO type_ref values (null,?,?)');
        $requette->execute(array($typeref, $support));
    }
    public static function listeRef()
    {
        $idcon = connexion();
        $requete = $idcon->prepare('SELECT * FROM type_ref');
        $requete->execute();
        return $requete->fetchAll();
    }
}
