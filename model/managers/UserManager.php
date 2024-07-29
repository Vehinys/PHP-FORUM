<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class UserManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\User";
    protected $tableName = "user";

    public function __construct(){
        parent::connect();
    }

    public function Membres($id) {

        $sql = "SELECT pseudo
                FROM ".$this->tableName." u 
                ORDER BY u.pseudo ASC";

        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }

    public function findOneByPseudo($pseudo){

        $sql = "SELECT *
                FROM ".$this->tableName." 
                WHERE pseudo = :pseudo
                ";
    
        return $this->getOneOrNullResult(
            DAO::select($sql, ['pseudo' => $pseudo], false), 
            $this->className
        );
    }




}