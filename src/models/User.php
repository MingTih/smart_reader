<?php

class User extends Db
{
// Récupération de tous les utilisateurs (admin)
    public static function getAllUsers()
    {
    // Requête SQL pour l'affichage
        $request = "SELECT * FROM user ORDER BY id_user DESC";
    // Préparation de la requête avec connexion à la BDD
        $preparedRequest = self::getDb()->prepare($request);
    // Execution de la requête
        $preparedRequest->execute();
    // Retour des info de tous les utilisateurs sous forme de liste 
        return $preparedRequest->fetchAll(PDO::FETCH_ASSOC);

    }

// Récupération des infos d'un seul utilisateur
    public static function getInfoUser()
    {
    // Récupération de la variable en GET
        $id = $_GET['id'];
    // Requête SQL pour l'affichage de l'utilisateur grâce à $id
        $request = "SELECT * FROM user WHERE id_user=?";
    // Préparation
        $preparedRequest = self::getDb()->prepare($request);
    // Execution de la requête
        $preparedRequest->execute([$id]);
    // Retour des infos de l'utilisateur sous forme de liste
        return $preparedRequest->fetch(PDO::FETCH_ASSOC); 
    }








}













?>