<?php
namespace Controller;

use App\ControllerInterface;
use App\AbstractController;
use app\session;
use Model\Managers\UserManager;

class SecurityController extends AbstractController{

    // contiendra les méthodes liées à l'authentification : register, login et logout
    // les mots de passe doivent être composés d'au minimum 12 caractères comprenant une majuscule, des minuscules, un chiffres et des caractères spéciaux.

    public function register () {

        if (isset($_POST["submit"])) {
            $userManager = new UserManager();

            // Filtrer la saisie des champs du formulaire d'inscription
            $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email  = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_VALIDATE_EMAIL);
            $pass1  = filter_input(INPUT_POST, "pass1", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pass2  = filter_input(INPUT_POST, "pass2", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $date   = date('Y-m-d H:i:s');

            if ($pseudo && $email && $pass1 && $pass2) {
                $user = $userManager->findOneByPseudo($pseudo);

            // Si l'utilisateur existe
            if($user) {
                Session::addFlash("error", "Ce nom d'utilisateur existe déjà !");

            } else {

                //insertion de l'utilisateur en BDD
                if($pass1 === $pass2 && strlen($pass1) >= 12) {  
                    $newUser = [
                        'pseudo' => $pseudo,
                        'email' => $email,                
                        'password' => password_hash($pass1, PASSWORD_DEFAULT),        
                        'dateInscription' => $date,
                        'role' =>  json_encode(["ROLE_USER"])
                    ];
                    
                    $userManager->add($newUser);
                    Session::addFlash("success", "Inscription réussie !");
                    $this->redirectTo("security", "loginView");
                    } else {
                        Session::addFlash("error", "Le mot de passe est invalide.");
                    }
                }
            } else {

                Session::addFlash("error", "Le pseudo ou mot de passe est invalide !");
            }
        }
        return [

            "view" => VIEW_DIR."forum/login.php",
            "meta_description" => "Page de login au forum"
        ];
    }

    public function registerView() {

        return [
            
            "view" => VIEW_DIR."forum/register.php",
            "meta_description" => "Formulaire d'inscription sur le forum",
            "data" => []
        ];
    }



    public function login () {

        if (isset($_POST["submit"])) {
            // var_dump($_POST);die;

            $userManager = new UserManager();

            $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // var_dump($email);die;
            // var_dump($password);die;

        //on vérife que les filtres sont valides
        if($pseudo && $password) {
            $user = $userManager->findOneByPseudo($pseudo);
            if($user) { 
                $hash = $user->getPassword();
                if(password_verify($password, $hash)) {
                    $_SESSION["user"] = $user;
                    $this->redirectTo("home", "index");
                } else {
                    Session::addFlash("error", "Le pseudo ou le mot de passe est invalide.");
                    header("Location: login.php"); exit;
                }
            }
        }
    }

    return [
        "view" => VIEW_DIR."forum/index.php",
        "meta_description" => "Page de l'index du forum"
    ];
}
    public function loginView() {
        return [
            "view" => VIEW_DIR."forum/login.php",
            "meta_description" => "Formulaire de login sur le forum",
            "data" => []
        ];
    }

    public function logout () {
        unset($_SESSION["user"]); 
        Session::addFlash("success", "Session déconnectée !"); 
        $this->redirectTo("home");
    }

}

