<?php
require_once "connexion.php";
class ModelReference
{
    static function EnvoieReference($userId, $typeRefId, $Nom, $Techno, $Contributeur, $lien)
    {
        $idcon = connexion();
        $requette = $idcon->prepare('INSERT INTO reference values (null,?,?,?,?)');
        $requette->execute(array($typeRefId, $Nom, $Techno, $Contributeur));

        $idRef = $idcon->lastInsertId();
        $requete2 = $idcon->prepare(' INSERT INTO user_ref VALUES (:userId,:idref, :lien)');
        $requete2->execute([
            ':userId' => $userId,
            ':idref' => $idRef,
            ':lien' => $lien,
        ]);
    }
    public  static function listeReference()
    {

        $idcon = connexion();
        $requete3 = $idcon->prepare('SELECT user.id as user_id, contributeurs,techno, lien, user.nom, reference.nom as nom2, prenom, support, type_ref, reference.id as reference_id FROM reference INNER JOIN user_ref ON reference.id=user_ref.ref_id inner JOIN user ON user.id=user_ref.user_id inner join type_ref ON type_ref.id=reference.type_ref_id ORDER by user.id');
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
    public static function modifReference($idRef, $idType, $nom, $techno, $contributeurs, $lien)
    {
        $idcon = connexion();
        $requete = $idcon->prepare(" UPDATE reference
            INNER JOIN user_ref
            ON ref_id=reference.id
            SET type_ref_id=:idType, nom=:nom, techno=:techno, contributeurs=:contributeurs,   lien=:lien
            WHERE reference.id=:idRef
        ");
        $requete->execute([
            ':idType' => $idType,
            ':nom' => $nom,
            ':techno' => $techno,
            ':contributeurs' => $contributeurs,
            ':lien' => $lien,
            ':idRef' => $idRef,
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
