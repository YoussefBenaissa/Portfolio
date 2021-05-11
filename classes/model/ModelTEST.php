<?php 
require_once "connexion.php";

class ModelComp{
    public static function ajoutComp($nom, $domaine, $description, $niveau){
        $idcon = connexion();
        $requete = $idcon -> prepare("INSERT INTO competence VALUES (null, :nom, :domaine, :description, :niveau)");
        $requete->execute([":nom"=>$nom,":domaine"=>$domaine, ":description"=>$description, ":niveau"=>$niveau]);
    }
    public static function afficheComp(){
        $idcon = connexion();
        $requete = $idcon -> prepare("SELECT * FROM competence");
        $requete->execute();
        return $requete->fetchAll();
    }
    public static function afficheID($id){
        $idcon = connexion();
        $requete = $idcon -> prepare("SELECT * FROM competence WHERE id = :id");
        $requete->execute([":id" => $id]);
        return $requete->fetch();
    }
    public static function modifComp($id, $nom, $domaine, $description, $niveau){
        $idcon = connexion();
        $requete = $idcon -> prepare("UPDATE competence
        SET nom = :nom , domaine = :domaine, description = :description, niveau = :niveau
        WHERE id = :id");
        $requete -> execute([":nom" => $nom, ":domaine" => $domaine, ":description" => $description, ":niveau" =>$niveau ,":id"=>$id]);
    }
    public static function suppComp($id){
        $idcon = connexion();
        $requete = $idcon -> prepare("DELETE FROM competence WHERE id = :id");
        $requete->execute([":id" => $id]);
    }
}