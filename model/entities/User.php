<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class User extends Entity{

    private $id;
    private $pseudo;
    private $password;
    private $dateInscription;
    private $role;

    public function __construct($data){         
        $this->hydrate($data);        
    }

    /**
     * Get the value of id
     */ 
    public function getId(){
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of pseudo
     */ 
    public function getPseudo(){
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword(){
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password){
        $this->password = $password;

        return $this;
    }

        /**
     * Get the value of dateInscription
     */ 
    public function getDateInscription(){
        return $this->dateInscription;
    }

    /**
     * Set the value of dateInscription
     *
     * @return  self
     */ 
    public function setDateInscription($dateInscription){
        $this->dateInscription = $dateInscription;

        return $this;
    }

    /**
    * Get the value of password
    */ 
    public function getRole(){
    return $this->role;
    }

    /**
    * Set the value of nickName
    *
    * @return  self
    */ 
    public function setRole($role){
    $this->role = $role;

    return $this;
    }

    public function __toString() :string {
        return (string)$this->pseudo;
    }

    public function hasRole($role) {
        return $this->role === $role;
    }
}