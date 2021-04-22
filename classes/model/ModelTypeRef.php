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
    public  static function getRef($id)
    {

        $idcon = connexion();
        $requete = $idcon->prepare('SELECT * FROM type_ref WHERE id=?');
        $requete->execute(array($id));
        return $requete->fetch();
    }
    public static function ModifTypeRef($id, $typeref, $support)
    {
        $idcon = connexion();
        $requet = $idcon->prepare("UPDATE type_ref SET type_ref = :type_ref , support=:support WHERE id = :id");
        $requet->execute([
            ':id' => $id,
            ':type_ref' => $typeref,
            ':support' => $support

        ]);
    }
    public static function suppTypeRef($id)
    {
        $idcon = connexion();
        $requet = $idcon->prepare("DELETE FROM type_ref  WHERE id = :id");
        $requet->execute([
            ':id' => $id,
        ]);
    }
}
