<?php
require_once "connexion.php";
class ModelSocial
{
    public static function ajoutSocial($userId, $typeSocialId, $lien)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
                    INSERT INTO social VALUES (null,:typeSocialId)
                ");
        $requete->execute([
            ':typeSocialId' => $typeSocialId
        ]);
        $idSocial = $idcon->lastInsertId();
        $requete2 = $idcon->prepare("
                    INSERT INTO user_soc VALUES (:userId,:idSocial, :lien)
                ");
        $requete2->execute([
            ':userId' => $userId,
            ':idSocial' => $idSocial,
            ':lien' => $lien,
        ]);
    }
    public  static function listeSocial()
    {

        $idcon = connexion();
        $requete3 = $idcon->prepare('SELECT user.id as user_id, lien, nom, prenom, type_soc, social.id as social_id
        from user_soc
        INNER JOIN user
        ON user_id=user.id

        INNER JOIN social
        ON user_soc.social_id=social.id

        INNER JOIN type_soc
        ON type_soc_id=type_soc.id

        ORDER BY user_id');
        $requete3->execute();
        return $requete3->fetchAll();
    }
    public static function getSocById($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare(" 
            SELECT * FROM social
            INNER JOIN user_soc
            ON social_id=social.id
            WHERE social.id=:id
        ");
        $requete->execute([
            ':id' => $id
        ]);
        return $requete->fetch();
    }
    public static function modifRs($id, $type_soc_id, $lien)
    {
        $idcon = connexion();
        $requete = $idcon->prepare('UPDATE social
        INNER JOIN user_soc
        ON social_id=social.id
        SET type_soc_id=:type_soc_id, lien=:lien
        WHERE social.id=:id');
        $requete->execute([
            ':type_soc_id' => $type_soc_id,
            ':lien' => $lien,
            ':id' => $id
        ]);
    }
}
