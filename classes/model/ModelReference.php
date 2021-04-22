<?php
require_once "connexion.php";
class ModelReference
{
    static function EnvoieReference($typeRefId, $Nom, $Techno, $Contributeur, $userId, $lien)
    {
        $idcon = connexion();
        $requette = $idcon->prepare('INSERT INTO reference values (null,?,?,?,?)');
        $requette->execute(array($typeRefId, $Nom, $Techno, $Contributeur));

        $idRef = $idcon->lastInsertId();
        $requete2 = $idcon->prepare("
                    INSERT INTO user_ref VALUES (:userId,:idref, :lien)
                ");
        $requete2->execute([
            ':userId' => $userId,
            ':idref' => $idRef,
            ':lien' => $lien,
        ]);
    }
    public  static function listeSocial()
    {

        $idcon = connexion();
        $requete3 = $idcon->prepare('SELECT user.id as user_id, lien, user.nom, prenom, type_ref, reference.id as reference_id
        from user_ref
        INNER JOIN user
        ON user_id=user.id
        INNER JOIN reference
        ON user_ref.ref_id=reference.id

        INNER JOIN type_ref
        ON ref_id=type_ref.id

        ORDER BY user_id');
        $requete3->execute();
        return $requete3->fetchAll();
    }
    public static function getReference($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare(" 
            SELECT * FROM reference
            INNER JOIN user_ref
            ON ref_id=reference.id
            WHERE reference.id=:id
        ");
        $requete->execute([
            ':id' => $id
        ]);
        return $requete->fetch();
    }
    public static function modifRef($id, $type_ref, $lien)
    {
        $idcon = connexion();
        $requete = $idcon->prepare('UPDATE reference
        INNER JOIN user_ref
        ON ref_id=reference.id
        SET ref_id=:ref_id, lien=:lien
        WHERE reference.id=:id');
        $requete->execute([
            ':ref_id' => $type_ref,
            ':lien' => $lien,
            ':id' => $id
        ]);
    }
    public static function suppRef($id)
    {
        $idcon = connexion();
        $requet = $idcon->prepare("DELETE  reference, user_ref
        FROM reference
        INNER JOIN user_ref
        ON reference.id=user_ref.ref_id
        WHERE reference.id=:id");
        $requet->execute([
            ':id' => $id
        ]);
    }
}
