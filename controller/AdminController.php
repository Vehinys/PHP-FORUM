<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;


class AdminController extends AbstractController implements ControllerInterface{


public function addCategory() {
       
       $categoryManager = new CategoryManager();

       $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS); // récupère et sanitise les valeurs de champs entrées par l'utilisateur
           $category = [ 'name' => $name];
           $categoryManager->add($category);  
           $this->redirectTo("forum", "index");
       }
   }