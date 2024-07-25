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

public function addTopic($id) {
    $topicManager = new TopicManager($id);
    $postManager = new postManager($id);
    //    var_dump($_POST);
    //    die();

    $title        = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $text         = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $topic_id     = $_GET['id'];
    $category_id  = $_GET['id'];

    var_dump($text);

    $topicManager->add(['title' => $title, 'category_id' => $category_id]); 
    $postManager->add(['text' => $text, 'topic_id' => $topic_id]);

    // $this->redirectTo("forum", "index");

    }
}
  

