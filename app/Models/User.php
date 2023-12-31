
<?php

//Recupération data avec GET 
//à compléter avec SQL
class User {

    private  $id ;
    private  $name ;
    private  $pwd ;
//refaie find pour user 
    public function findById($productId)
	{
		
		$sql = '';

		// Connexion à la BDD
		$pdo = Database::getPDO();

		// Exécuter la requete SELECT
		$pdoStatement = $pdo->query($sql);

		// Récupérer les résultats sous forme d'une seule instance de produit
		// Retourne une instances de Product
		$product = $pdoStatement->fetchObject('Product');

		// retourner le résultat
		return $product;
	}

}


$login= !empty($_GET['login']) ? $_GET['login'] : "";
$pwd= !empty($_GET['pwd']) ? $_GET['pwd'] : "";
$message="";
if(empty($login)){
    $message= "Rentrez votre login !" ;
}
else if (in_array($login, $users)==false) {
    $message= "Vous etes pas ds la bd !" ;
    $login="";
}
else {
    if(empty($pwd)){
    $message= "Rentrez votre mot de passe !" ;
    }
    else if($usersLoginID[$login]!=$pwd) {
        $message= "Mot de passe invalide!" ;
    }
    else {
        $message= "Bienvenue {$login} !" ;
    }
}
//Retour 
if(!empty($GET)){
    header("Location: index.php");

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
?>