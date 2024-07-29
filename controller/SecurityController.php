<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use app\DAO;

class SecurityController extends AbstractController{

    // contiendra les méthodes liées à l'authentification : register, login et logout

    function register($pdo) {

        // Vérifiez si le formulaire est soumis

        if (isset($_POST["submit"])) {

            // Filtrer la saisie des champs du formulaire d'inscription

            $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email  = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            $pass1  = filter_input(INPUT_POST, "pass1", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pass2  = filter_input(INPUT_POST, "pass2", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


            if ($pseudo && $email && $pass1 && $pass2) {
                $requete = $pdo->prepare("SELECT * FROM user WHERE email = :email");
                $requete->execute(["email" => $email]);
                $user = $requete->fetch();
    
                // Si l'utilisateur existe

                if ($user) {

                    header("Location: register.php");exit;

                } else {

                    // Insertion de l'utilisateur en BDD

                    if ($pass1 == $pass2 && strlen($pass1) >= 5) { // Vérification que les 2 mots de passes sont identiques et qu'il a un minimum de caractères
                        $insertUser = $pdo->prepare("INSERT INTO user (pseudo, email, password) VALUES (:pseudo, :email, :password)");
                        $insertUser->execute([ // Insertion de l'utilisateur dans la BDD avec une requête préparée (pour éviter les injections SQL)

                            "pseudo"   => $pseudo,
                            "email"    => $email,
                            "password" => password_hash($pass1, PASSWORD_DEFAULT) // On stocke le mot de passe hashé en base de données
                        ]);

                        header("Location: login.php");
                        exit; // Prendre l'habitude de faire un exit après une redirection avec la méthode header();

                    } else {

                        // Message "Les mots de passe ne sont pas identiques ou mot de passe trop court !"
                        echo "Les mots de passe ne sont pas identiques ou le mot de passe est trop court !";
                    }
                }

            } else {

                // Problème de saisie dans les champs de formulaire
                echo "Veuillez remplir tous les champs du formulaire correctement !";

            }

        } else {

            // Par défaut, j'affiche le formulaire d'inscription
            header("Location: register.php");exit;
        }
    }
    
    public function login () {

    }

    public function logout () {

    }

}