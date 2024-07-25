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
  
      $title        = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $creationDate = filter_input(INPUT_POST, 'creationDate', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $text         = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  
      if ($title && $text) {

          $topicId = $topicManager->add([
              'title' => $title,
              'creationDate' => $creationDate,
          ]);
  

          $postManager->add([
              'topic_id' => $topicId,
              'text' => $text,
          ]);
  
          $this->redirectTo("forum", "index");
  }
}
  

}