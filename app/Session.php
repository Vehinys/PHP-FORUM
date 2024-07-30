<?php
namespace App;

class Session{

    private static $categories = ['error', 'success'];

    /**
    *   ajoute un message en session, dans la catégorie $categ
    */
    public static function addFlash($categ, $msg){
        $_SESSION[$categ] = $msg;
    }

    /**
    *   renvoie un message de la catégorie $categ, s'il y en a !
    */
    public static function getFlash($categ){
        
        if(isset($_SESSION[$categ])){
            $msg = $_SESSION[$categ];  
            unset($_SESSION[$categ]);
        }
        else $msg = "";
        
        return $msg;
    }

    /**
    *   met un user dans la session (pour le maintenir connecté)
    */

    public static function setUser($user){
        $_SESSION["user"] = $user;
    }

    // Les méthodes statiques peuvent être appelées sans qu'une instance d'objet n'ait été créée.
    // La méthode statique getUser() vérifie si un utilisateur est stocké dans la session et le renvoie, ou retourne false s'il n'existe pas.

    public static function getUser(){

        //  Vérifie si l'utilisateur est connecté ($_SESSION['user]), sinon, indique que l'utilisateur n'est pas connecté ($_SESSION['user'] : false).

        return (isset($_SESSION['user'])) ? $_SESSION['user'] : false;

        // Ceci est une fonction ternaire : Si la session de l'utilisateur est active (connecté), alors retourne la valeur de $_SESSION['user']; sinon, retourne false.
        // [SI] - [ALORS] - [SINON]
    }

    public static function isAdmin(){

        // attention de bien définir la méthode "hasRole" dans l'entité User en fonction de la façon dont sont gérés les rôles en base de données

        // Si le getUser est connecté et que le getUser a le ROLE_ADMIN alors donne lui les droits ADMIN SINON : rien 

        if(self::getUser() && self::getUser()->hasRole("ROLE_ADMIN")) {
            return true;
        }
        return false;
    }
}