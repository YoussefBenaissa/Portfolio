<?php
require_once "connexion.php";
class ModelUser
{

    static function EnvoieDonnee($nom, $prenom, $mail, $tel, $adresse, $photo, $description)
    {
        $idcon = connexion();
        $requette = $idcon->prepare('INSERT INTO user values (null,?,?,?,?,?,?,?)');
        $requette->execute(array($nom, $prenom, $mail, $tel, $adresse, $photo, $description));
    }
    public static function listeUsers()
    {
        $idcon = connexion();
        $requete = $idcon->prepare('SELECT * FROM user');
        $requete->execute();
        return $requete->fetchAll();
    }
    public  static function getUser($id)
    {

        $idcon = connexion();
        $requete3 = $idcon->prepare('SELECT * FROM USER WHERE id=?');
        $requete3->execute(array($id));
        return $requete3->fetch();
    }

    public static function ModifProfil($id, $nom, $prenom, $mail, $tel, $adresse, $photo, $description)
    {
        $idcon = connexion();
        $requetModif = $idcon->prepare("UPDATE user SET nom = :nom, prenom = :prenom, mail = :mail, tel = :tel,
         adresse = :adresse, photo = :photo, description = :descriptions WHERE id = :id");
        $requetModif->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':mail' => $mail,
            ':tel' => $tel,
            ':adresse' => $adresse,
            ':photo' => $photo,
            ':descriptions' => $description

        ]);
    }
    public static function suppUser($id){
        $idcon=connexion();
        $requetModif=$idcon->prepare("DELETE FROM user  WHERE id = :id");
        $requetModif->execute([
            ':id' => $id,
         ]);
    }
}
