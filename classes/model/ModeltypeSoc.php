<?php
require_once "connexion.php";
class ModeleTypeSoc
{
    static function EnvoieTypeSOC($typesoc)
    {
        $idcon = connexion();
        $requette = $idcon->prepare('INSERT INTO type_soc values (null,?)');
        $requette->execute(array($typesoc));
    }
    public static function listeSoc()
    {
        $idcon = connexion();
        $requete = $idcon->prepare('SELECT * FROM type_soc');
        $requete->execute();
        return $requete->fetchAll();
    }
    public  static function getSoc($id)
    {

        $idcon = connexion();
        $requete = $idcon->prepare('SELECT * FROM type_soc WHERE id=?');
        $requete->execute(array($id));
        return $requete->fetch();
    }
    public static function ModifSoc($id, $typesoc)
    {
        $idcon = connexion();
        $requet = $idcon->prepare("UPDATE type_soc SET type_soc = :type_soc  WHERE id = :id");
        $requet->execute([
            ':id' => $id,
            ':type_soc' => $typesoc,

        ]);
    }
    public static function suppSoc($id)
    {
        $idcon = connexion();
        $requet = $idcon->prepare("DELETE FROM type_soc  WHERE id = :id");
        $requet->execute([
            ':id' => $id,
        ]);
    }
}
