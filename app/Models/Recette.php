<?php

class Recette {
    private $id ;
    private $titre ;
    private $personne ;
    private $ingredient1 ;
    private $quantite1 ;
    private $ingredient2 ;
    private $quantite2 ;
    private $ingredient3 ;
    private $quantite3 ;
    private $ingredient4 ;
    private $quantite4 ;
    private $ingredient5 ;
    private $quantite5 ;
    private $ingredient6 ;
    private $quantite6 ;
    private $step1 ;
    private $step2 ;
    private $step3 ;
    private $step4 ;
    private $step5 ;
    private $step6 ;
    private $step7 ;
    private $step8 ;
    private $step9 ;
    private $step10 ;


    public function find($recipeId)
	{
		$sql = "SELECT recettes.* FROM recettes WHERE id=$recipeId";
		$pdo = Database::getPDO();
		$pdoStatement = $pdo->query($sql);
		$recette = $pdoStatement->fetchObject('Recette');
		return $recette;
	}
	

    public function findAll(){
            $sql = 'SELECT recettes.* FROM recettes';
            $pdo = Database::getPDO();
            $pdoStatement = $pdo->query($sql);
            $recettesList = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Recette');
            return $recettesList;
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
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of personne
     */ 
    public function getPersonne()
    {
        return $this->personne;
    }

    /**
     * Set the value of personne
     *
     * @return  self
     */ 
    public function setPersonne($personne)
    {
        $this->personne = $personne;

        return $this;
    }

    /**
     * Get the value of ingredient1
     */ 
    public function getIngredient1()
    {
        return $this->ingredient1;
    }

    /**
     * Set the value of ingredient1
     *
     * @return  self
     */ 
    public function setIngredient1($ingredient1)
    {
        $this->ingredient1 = $ingredient1;

        return $this;
    }

    /**
     * Get the value of quantite1
     */ 
    public function getQuantite1()
    {
        return $this->quantite1;
    }

    /**
     * Set the value of quantite1
     *
     * @return  self
     */ 
    public function setQuantite1($quantite1)
    {
        $this->quantite1 = $quantite1;

        return $this;
    }

    /**
     * Get the value of ingredient2
     */ 
    public function getIngredient2()
    {
        return $this->ingredient2;
    }

    /**
     * Set the value of ingredient2
     *
     * @return  self
     */ 
    public function setIngredient2($ingredient2)
    {
        $this->ingredient2 = $ingredient2;

        return $this;
    }

    /**
     * Get the value of quantite2
     */ 
    public function getQuantite2()
    {
        return $this->quantite2;
    }

    /**
     * Set the value of quantite2
     *
     * @return  self
     */ 
    public function setQuantite2($quantite2)
    {
        $this->quantite2 = $quantite2;

        return $this;
    }

    /**
     * Get the value of ingredient3
     */ 
    public function getIngredient3()
    {
        return $this->ingredient3;
    }

    /**
     * Set the value of ingredient3
     *
     * @return  self
     */ 
    public function setIngredient3($ingredient3)
    {
        $this->ingredient3 = $ingredient3;

        return $this;
    }

    /**
     * Get the value of quantite3
     */ 
    public function getQuantite3()
    {
        return $this->quantite3;
    }

    /**
     * Set the value of quantite3
     *
     * @return  self
     */ 
    public function setQuantite3($quantite3)
    {
        $this->quantite3 = $quantite3;

        return $this;
    }

    /**
     * Get the value of ingredient4
     */ 
    public function getIngredient4()
    {
        return $this->ingredient4;
    }

    /**
     * Set the value of ingredient4
     *
     * @return  self
     */ 
    public function setIngredient4($ingredient4)
    {
        $this->ingredient4 = $ingredient4;

        return $this;
    }

    /**
     * Get the value of quantite4
     */ 
    public function getQuantite4()
    {
        return $this->quantite4;
    }

    /**
     * Set the value of quantite4
     *
     * @return  self
     */ 
    public function setQuantite4($quantite4)
    {
        $this->quantite4 = $quantite4;

        return $this;
    }

    /**
     * Get the value of ingredient5
     */ 
    public function getIngredient5()
    {
        return $this->ingredient5;
    }

    /**
     * Set the value of ingredient5
     *
     * @return  self
     */ 
    public function setIngredient5($ingredient5)
    {
        $this->ingredient5 = $ingredient5;

        return $this;
    }

    /**
     * Get the value of quantite5
     */ 
    public function getQuantite5()
    {
        return $this->quantite5;
    }

    /**
     * Set the value of quantite5
     *
     * @return  self
     */ 
    public function setQuantite5($quantite5)
    {
        $this->quantite5 = $quantite5;

        return $this;
    }

    /**
     * Get the value of ingredient6
     */ 
    public function getIngredient6()
    {
        return $this->ingredient6;
    }

    /**
     * Set the value of ingredient6
     *
     * @return  self
     */ 
    public function setIngredient6($ingredient6)
    {
        $this->ingredient6 = $ingredient6;

        return $this;
    }

    /**
     * Get the value of quantite6
     */ 
    public function getQuantite6()
    {
        return $this->quantite6;
    }

    /**
     * Set the value of quantite6
     *
     * @return  self
     */ 
    public function setQuantite6($quantite6)
    {
        $this->quantite6 = $quantite6;

        return $this;
    }

    /**
     * Get the value of step1
     */ 
    public function getStep1()
    {
        return $this->step1;
    }

    /**
     * Set the value of step1
     *
     * @return  self
     */ 
    public function setStep1($step1)
    {
        $this->step1 = $step1;

        return $this;
    }

    /**
     * Get the value of step2
     */ 
    public function getStep2()
    {
        return $this->step2;
    }

    /**
     * Set the value of step2
     *
     * @return  self
     */ 
    public function setStep2($step2)
    {
        $this->step2 = $step2;

        return $this;
    }

    /**
     * Get the value of step3
     */ 
    public function getStep3()
    {
        return $this->step3;
    }

    /**
     * Set the value of step3
     *
     * @return  self
     */ 
    public function setStep3($step3)
    {
        $this->step3 = $step3;

        return $this;
    }

    /**
     * Get the value of step4
     */ 
    public function getStep4()
    {
        return $this->step4;
    }

    /**
     * Set the value of step4
     *
     * @return  self
     */ 
    public function setStep4($step4)
    {
        $this->step4 = $step4;

        return $this;
    }

    /**
     * Get the value of step5
     */ 
    public function getStep5()
    {
        return $this->step5;
    }

    /**
     * Set the value of step5
     *
     * @return  self
     */ 
    public function setStep5($step5)
    {
        $this->step5 = $step5;

        return $this;
    }

    /**
     * Get the value of step6
     */ 
    public function getStep6()
    {
        return $this->step6;
    }

    /**
     * Set the value of step6
     *
     * @return  self
     */ 
    public function setStep6($step6)
    {
        $this->step6 = $step6;

        return $this;
    }

    /**
     * Get the value of step7
     */ 
    public function getStep7()
    {
        return $this->step7;
    }

    /**
     * Set the value of step7
     *
     * @return  self
     */ 
    public function setStep7($step7)
    {
        $this->step7 = $step7;

        return $this;
    }

    /**
     * Get the value of step8
     */ 
    public function getStep8()
    {
        return $this->step8;
    }

    /**
     * Set the value of step8
     *
     * @return  self
     */ 
    public function setStep8($step8)
    {
        $this->step8 = $step8;

        return $this;
    }

    /**
     * Get the value of step9
     */ 
    public function getStep9()
    {
        return $this->step9;
    }

    /**
     * Set the value of step9
     *
     * @return  self
     */ 
    public function setStep9($step9)
    {
        $this->step9 = $step9;

        return $this;
    }

    /**
     * Get the value of step10
     */ 
    public function getStep10()
    {
        return $this->step10;
    }

    /**
     * Set the value of step10
     *
     * @return  self
     */ 
    public function setStep10($step10)
    {
        $this->step10 = $step10;

        return $this;
    }
}