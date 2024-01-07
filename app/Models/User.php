<?php


namespace recettes\Models ;
use recettes\Utils\Database ;
use PDO ;


// $login= !empty($_GET['login']) ? $_GET['login'] : "";
// $pwd= !empty($_GET['pwd']) ? $_GET['pwd'] : "";
// $message="";
class User {


    private  $id ;
    private  $name ;
    private  $pwd ;

//refaire find pour user _fetcher un seul  user
    public function findByLogin($login)
    //fetcher avec execute
    // {
    //     $sql = 'SELECT users.*
    //     FROM users 
    //     WHERE users.name= :login ;';
    //     $pdo = Database::getPDO();
    //     $pdoStatement = $pdo->prepare($sql);
    //     //$pdoStatement = $pdo->query($sql);
    //     $pdoStatement->execute([
    //     'login' => $login,
    //     ]);
    //     $user = $pdoStatement->fetchObject('User');
    //     return $user ;
    // } 
    
	{   dump(gettype($login));
        // $login=strval($login) ;
        $sql = "SELECT users.* FROM users WHERE users.name ='lor' ";
		$pdo = Database::getPDO();
		$pdoStatement = $pdo->query($sql);
		$user = $pdoStatement->fetchObject('user');
        dump($user);
		return $user;
	}

     /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

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
}


