<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;


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

public function addTopic() {

   $postManager = new PostManager();
   $topicManager = new TopicManager();

   //    var_dump($_POST);
   //    die();

   $title        = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $creationDate = filter_input(INPUT_POST, 'creationDate', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

   $user         = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $text         = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

   //    var_dump($title);

   $topicManager->add(['title' => $title]); 
   $topicManager->add(['creationDate' => $creationDate]); 
   $topicManager->add(['user' => $user]); 

   $postManager ->add(['text' => $text]);  

   $this->redirectTo("forum", "index");

   }

}