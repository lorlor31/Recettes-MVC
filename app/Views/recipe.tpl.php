//Utiliser la class pour ranger les données et s'y référer


<?php
//Création tableau avec les ingredients de type "ingredient1=>pâtes"
$ingredientsFromDb= [] ;
$amounts=[] ;
$steps = [] ;
$ingredAmountArr=[] ;//tabl.asso ingre=>quantite
$ingredUnitesFromDb = [] ;
$ingredUniteArr=[];
//Création variable des ingrédients /variable des etapes/quantites selon leur nom ds la bdd
foreach($recipe as $RecipeProperty=>$value) {
    if (str_contains($RecipeProperty,'ingredient') && $value!=null) {
        $ingredients[] = $value ;
    }
    if (str_contains($RecipeProperty,'step') && $value!=null){
        $steps[] = $value ;
    }
    if (str_contains($RecipeProperty,'quantite') && $value!=null) {
        $amounts[] = $value ;
    }
}


foreach ($ingredients as $ingredient){
    $ingredUnitesFromDb[]=dbFromIngredient($pdoRecettes,$ingredient)[0]  ;
    }
// Création d'un tableau associatif ingrédient->unite avec les données de la BDD
foreach ($ingredUnitesFromDb as $key=>$ingredUnite) { 
    $ingredUniteArr[$ingredUnite['ingredient']] = $ingredUnite['unite'] ;
}

// Création d'un tableau associatif ingrédient->quantité avec les données de la BDD
for ( $i=0 ; $i<count($ingredients) ; $i++) {
    $ingredAmountArr[$ingredients[$i]]=$amounts[$i] ;
}

//création d'un objet à partir des data de la BDD, dt les données vt être manipulées pour l'affichage
$newRecipeFromDb = new Recipe($recipe['id'],$recipe['titre'],$recipe['image'],$recipe['personne'] ,$ingredAmountArr,$ingredUniteArr,$steps) ;

//Variables nécessaires
$isActiveEditionMode=false ;

//Variables crrspdt aux datas
$id= $newRecipeFromDb->id ;
$name= $newRecipeFromDb->titre ;
$image=$newRecipeFromDb->image ;
$persons= $newRecipeFromDb->personne ;
$ingredAmount= $newRecipeFromDb->ingredAmount ;
$ingredUnit= $newRecipeFromDb->ingredUnit ;
$steps= $newRecipeFromDb->steps ;
?>

<main>
<!-- /*
 <h1 <?php if($name=='Riz au skia') { ?>
    class="titreRose ">
            <?php }  ?>
            <?= $name ?> </h1>
            */ -->
    <h1>
        <?= $name ?>
    </h1>


    <section class="section" id="firstPart">
        <div class="picture">
            <h2>
                <?= $name ?> pour
                <span class="numOfPers" data-persons= <?= $persons ?> > <?= $persons ?> </span>
                <?php include "./tpl/toggleEditionButton.tpl.php"; ?>

                <label class="numOfPersLabel invisible" for="numOfPersInput" > <label>
                <form>
                <input class="numOfPersInput invisible" data-persons= <?=$persons?> type="number" 
                name="numOfPersInput" value=<?= $persons ?> > </input>
                </form>
                personnes
            </h2>
            <img src="./images/<?=$image?>"/>
        </div>


        
        <div class="ingredients">
            <ul>
                <?php 
                d($ingredUnit) ;
                foreach ($ingredAmount as $ingredient => $amount){?>
                    <li>
                        <span class="ingredient"> <?=$ingredient?> :  </span>
                        <span class="amount" data-amount= <?= $amount?>> <?=$amount?> </span>
                    <?php    foreach ($ingredUnit as $ingredient=>$unit){?>   
                        <span class="unit" data-amount= <?= $unit?>> <?=$unit?> </span>
                    <?php  } ?>    
                <?php  } ?>


            </ul>
        </div>

    </section>

    <section class="section" id="etapes">
        <h2> Etapes de la recette </h2>
        <p>
            <ol>
            <?php foreach ($steps as $step){?>
                <li> <?php echo ucfirst($step)?>  </li>
            <?php }?>
            </ol>
        </p>
    </section>

    <section class="section" id="commentaires">
        <h2> Commentaires </h2>
    </section>
</main>

