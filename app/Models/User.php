<?php

namespace recettes\Models ;
use PDO ;
use recettes\Utils\Database ;
use recettes\Models\CoreModel;

class User {

    private $id ;
    private $created_at ;
    private $updated_at ;
    private  $login ;
    private  $pwd ;
    private  $role ;

    public function insert()
    {
        $pdo = Database::getPDO();
        $sql = "INSERT INTO `users` (`id`, `login`, `pwd`,`role`,`created_at`,`updated_at`)
                VALUES (:id, :login, :pwd,:role,NOW(),NOW());";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':login', $this->login);
        $stmt->bindParam(':pwd', $this->pwd);
        $stmt->bindParam(':role', $this->role);
        //$stmt->bindParam(':created_at', $this->created_at);
        //$stmt->bindParam(':updated_at', $this->updated_at);
        $success = $stmt->execute();
        if ($success === true) {
            $this->id = $pdo->lastInsertId();
            return true;
        }
        return false;
    }

    public static function findByLogin($login){
		$pdo = Database::getPDO();
        $sql = "SELECT users.* FROM users WHERE users.login =:login";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        $user =  $stmt->fetchObject(self::class);
        print_r($user);
		return $user;
	}

    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `users`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $results;
    }

     /**
     * Get the value of login
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of pwd
     */ 
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * Set the value of pwd
     *
     * @return  self
     */ 
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }

   
    
    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}


