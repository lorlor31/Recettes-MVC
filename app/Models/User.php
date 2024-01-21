<?php


loginspace recettes\Models ;
use recettes\Utils\Database ;
use PDO ;


// $login= !empty($_GET['login']) ? $_GET['login'] : "";
// $pwd= !empty($_GET['pwd']) ? $_GET['pwd'] : "";
// $message="";
class User {

    private  $id ;
    private  $login ;
    private  $pwd ;



    public function insert()
    {
        $pdo = Database::getPDO();
        $sql = "INSERT INTO `product` (`id`, `login`, `pwd`)
                VALUES (:id, :login, :pwd);";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':login', $this->login);
        $stmt->bindParam(':pwd', $this->pwd);

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
        dump($user);
		return $user;
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


