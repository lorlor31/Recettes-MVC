<?php

namespace recettes\Models ;
use recettes\Utils\Database ;
use PDO ;

class Comment {
    
    private $id ;
    private $recipe_id ;
    private $user_id ;
    private $comment ;
    private $created_at;
    private $user_login;
    
//Fetcher tous les commentaires de la recette $id 

    public static function findAllCommentsWithUserNameByRecipeID($recipeId)
	{
		$sql = "SELECT comments.* ,users.login AS user_login
        FROM comments
        INNER JOIN recipes ON recipes.id = comments.recipe_id
        INNER JOIN users ON users.id = comments.user_id
        WHERE recipes.id=$recipeId
        ORDER BY comments.created_at ASC"
        ;
		$pdo = Database::getPDO();
		$pdoStatement = $pdo->query($sql);
		$comments = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
		return $comments;
	}

//////////////////////////////////////////////////////

    public function find($stepId)
	{
		$sql = "SELECT steps.* FROM steps WHERE id=$recipeId";
		$pdo = Database::getPDO();
		$pdoStatement = $pdo->query($sql);
		$step = $pdoStatement->fetchObject('Step');
		return $step;
	}
	
    public function findAll(){
            $sql = 'SELECT steps.* FROM steps';
            $pdo = Database::getPDO();
            $pdoStatement = $pdo->query($sql);
            $stepsList = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Step');
            return $stepsList;
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
     * Get the value of recipe_id
     */ 
    public function getRecipe_id()
    {
        return $this->recipe_id;
    }

    /**
     * Set the value of recipe_id
     *
     * @return  self
     */ 
    public function setRecipe_id($recipe_id)
    {
        $this->recipe_id = $recipe_id;

        return $this;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of comment
     */ 
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */ 
    public function setComment($comment)
    {
        $this->comment = $comment;

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
     * Get the value of user_login
     */ 
    public function getUser_login()
    {
        return $this->user_login;
    }

    /**
     * Set the value of user_login
     *
     * @return  self
     */ 
    public function setUser_login($user_login)
    {
        $this->user_login = $user_login;

        return $this;
    }
}
