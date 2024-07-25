<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;

class ForumController extends AbstractController implements ControllerInterface{

    public function index() {
        
        // Créer une nouvelle instance de CategoryManager
        $categoryManager = new CategoryManager();
        // Récupérer la liste de toutes les catégories triées par nom
        $categories = $categoryManager->findAll(["name", "ASC"]);

        // Le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        return [
            "view"             => VIEW_DIR."forum/listCategories.php",
            "meta_description" => "Liste des catégories du forum",
            "data"             => [
                "categories"   => $categories
            ]
        ];
    }

    public function listTopicsByCategory($id) {

        $topicManager    = new TopicManager();
        $categoryManager = new CategoryManager();
        $category        = $categoryManager->findOneById($id);
        $topics          = $topicManager->findTopicsByCategory($id);

        return [
            "view"             => VIEW_DIR."forum/listTopics.php",
            "meta_description" => "Liste des topics par catégorie : ".$category->getName(),
            "data"             => [
                "category"     => $category,
                "topics"       => $topics
            ]
        ];
    }

    public function listPostsByTopic($id) {
        $topicManager = new TopicManager();
        $postManager = new PostManager();

        $topic = $topicManager->findOneById($id);
        $posts = $postManager->findPostsByTopic($id);

        return [
            "view" => VIEW_DIR."forum/listPosts.php",
            "meta_description" => "Messages postés sur le topic : ".$topic,
            "data" => [
                "topic" => $topic,
                "posts" => $posts
            ]
        ];
    }

    public function addTopic($id) {
        $topicManager = new TopicManager($id);
        $postManager = new postManager($id);
        //    var_dump($_POST);
        //    die();
    
        $title        = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $text         = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
     
        $category_id  = $_GET['id'];
    
        $topicId =  $topicManager->add(['title' => $title, 'category_id' => $category_id]); 
        $postManager->add(['text' => $text, 'topic_id' =>$topicId ]);
    
        $this->redirectTo("forum", "index");
    
        }
}
