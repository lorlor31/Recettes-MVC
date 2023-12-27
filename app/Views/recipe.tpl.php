<?php

dump($viewData->getTitre()) ;

// //Création variable des ingrédients /variable des etapes/quantites selon leur nom ds la bdd
// foreach($recipe as $RecipeProperty=>$value) {
//     if (str_contains($RecipeProperty,'ingredient') && $value!=null) {
//         $ingredients[] = $value ;
//     }
//     if (str_contains($RecipeProperty,'step') && $value!=null){
//         $steps[] = $value ;
//     }
//     if (str_contains($RecipeProperty,'quantite') && $value!=null) {
//         $amounts[] = $value ;
//     }
// }


// foreach ($ingredients as $ingredient){
//     $ingredUnitesFromDb[]=dbFromIngredient($pdoRecettes,$ingredient)[0]  ;
//     }
// // Création d'un tableau associatif ingrédient->unite avec les données de la BDD
// foreach ($ingredUnitesFromDb as $key=>$ingredUnite) { 
//     $ingredUniteArr[$ingredUnite['ingredient']] = $ingredUnite['unite'] ;
// }

// // Création d'un tableau associatif ingrédient->quantité avec les données de la BDD
// for ( $i=0 ; $i<count($ingredients) ; $i++) {
//     $ingredAmountArr[$ingredients[$i]]=$amounts[$i] ;
// }

// //création d'un objet à partir des data de la BDD, dt les données vt être manipulées pour l'affichage
// $newRecipeFromDb = new Recipe($recipe['id'],$recipe['titre'],$recipe['image'],$recipe['personne'] ,$ingredAmountArr,$ingredUniteArr,$steps) ;

// //Variables nécessaires
// $isActiveEditionMode=false ;

//Variables crrspdt aux datas
$id= $viewData->getId() ;
$titre= $viewData->getTitre()  ;
$image=$viewData->getImage()  ;
$persons= $viewData->getPersonne()  ;
$ingredient1 = $viewData->getIngredient1() ;
$quantite1= $viewData->getquantite1() ;
$ingredient2 = $viewData->getIngredient2() ;
$quantite2= $viewData->getquantite2() ;
$ingredient3= $viewData->getIngredient3() ;
$quantite3= $viewData->getquantite3() ;
$ingredient4 = $viewData->getIngredient4() ;
$quantite4= $viewData->getquantite4() ;
$ingredient5 = $viewData->getIngredient5() ;
$quantite5= $viewData->getquantite5() ;
$ingredient6 = $viewData->getIngredient6() ;
$quantite6= $viewData->getquantite6() ;

$step1= $viewData->getStep1() ;
$step2= $viewData->getStep2() ;
$step3= $viewData->getStep3() ;
$step4= $viewData->getStep4() ;
$step5= $viewData->getStep5() ;
$step6= $viewData->getStep6() ;
$step7= $viewData->getStep7() ;
$step8= $viewData->getStep8() ;

?>

 <main>

 <h1 <?php if($titre=='Riz au skia') { ?>
    class="titreRose ">
            <?php }  ?>
            <?= $titre ?> </h1>
        
    <h1>
        <?=$titre?>
    </h1>


<section class="section" id="firstPart">
        <div class="picture">
            <h2>
                <?= $titre?> pour
                <span class="numOfPers" data-persons= <?=$persons?> > <?=$persons?> </span>
                <?php include "./tpl/toggleEditionButton.tpl.php"; ?>

                <label class="numOfPersLabel invisible" for="numOfPersInput" > <label>
                <form>
                <input class="numOfPersInput invisible" data-persons= <?=$persons?> type="number" 
                name="numOfPersInput" value=<?= $persons?> > </input>
                </form>
                personnes
            </h2>
            <img src="./images/<?=$image?>"/>
        </div>

        <div class="ingredients">
            <ul>
                 <li>
                        <span class="ingredient"> <?=$ingredient?> :  </span>
                        <span class="amount" data-amount= <?= $amount?>> <?=$amount?> </span>
                        <span class="unit" data-amount= <?= $unit?>> <?=$unit?> </span>



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
 -->
