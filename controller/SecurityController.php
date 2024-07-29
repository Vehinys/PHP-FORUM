<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;
use app\session;

class SecurityController extends AbstractController{

    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function registerView() {
        return [
            "view" => VIEW_DIR."forum/register.php",
            "meta_description" => "Formulaire d'inscription sur le forum",
            "data" => []
        ];
    }

    public function register () {
        if (isset($_POST["submit"])) {

            // $userManager = new UserManager();

            // Filtrer la saisie des champs du formulaire d'inscription
            $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email  = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_SANITIZE_EMAIL);
            $pass1  = filter_input(INPUT_POST, "pass1", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pass2  = filter_input(INPUT_POST, "pass2", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $date   = date('Y-m-d H:i:s');


            if ($pseudo && $email && $pass1 && $pass2) {
                var_dump("OK");die;
            }
        }
    }

    //             $user = $userManager->findOneBypseudo($pseudo);

    //         // Si l'utilisateur existe

    //         if($user) {

    //             Session::addFlash("error", "Ce nom d'utilisateur existe déjà !");

    //         } else {

    //             //insertion de l'utilisateur en BDD
    //             if($pass1 === $pass2 && strlen($pass1) >= 5) {  
    //                 $newUser = [

    //                     'pseudo' => $pseudo,                
    //                     'password' => password_hash($pass1, PASSWORD_DEFAULT),        
    //                     'dateInscription' => $date,   
    //                 ];

    //                 $userManager->add($newUser);

    //                 Session::addFlash("success", "Inscription réussie !");
    //                 $this->redirectTo("security", "loginForm");

    //                 } else {
    //                     Session::addFlash("error", "Le mot de passe est invalide.");
    //                 }
    //             }

    //         } else {

    //             Session::addFlash("error", "Le pseudo ou mot de passe est invalide !");
    //         }
    //     }
    //     return [

    //         "view" => VIEW_DIR."forum/login.php",
    //         "meta_description" => "Page d'inscription au forum"
    //     ];
    // }

    public function loginView() {

        return [

            "view" => VIEW_DIR."forum/login.php",
            "meta_description" => "Formulaire de login sur le forum",
            "data" => []
        ];
    }
    
    public function login () {

    }

    public function logout () {

        unset($_SESSION["user"]); 

        Session::addFlash("success", "Session déconnectée !"); 

        $this->redirectTo("home");
    }

}

