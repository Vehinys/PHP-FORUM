<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class PostManager extends Manager{

    protected $className = "Model\Entities\Post";
    protected $tableName = "post";

    public function __construct(){
        parent::connect();
    }

    public function findPostsByTopic($id) {

        $sql = "SELECT * 
                FROM ".$this->tableName." t 
                WHERE t.topic_id = :id
                ORDER BY creationDate";
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }
}
