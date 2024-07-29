<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;

class AdminController extends AbstractController implements ControllerInterface{


public function addCategory() {
   
   $categoryManager = new CategoryManager();
    //    var_dump($_POST);
    //    die();

   $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //    var_dump($name);

   $categoryManager->add(['name' => $name]);  
   $this->redirectTo("forum", "index");

   }
}
  

