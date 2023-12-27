<?php

// dump($recipe->getTitre()) ;


//Variables crrspdt aux datas
$recipe=$viewData['currentRecette'];
dump($recipe) ;
$id= $recipe->getId() ;
$titre= $recipe->getTitre()  ;
$image=$recipe->getImage()  ;
$persons= $recipe->getPersonne()  ;
$ingredient1 = $recipe->getIngredient1() ;
$quantite1= $recipe->getquantite1() ;
$ingredient2 = $recipe->getIngredient2() ;
$quantite2= $recipe->getquantite2() ;
$ingredient3= $recipe->getIngredient3() ;
$quantite3= $recipe->getquantite3() ;
$ingredient4 = $recipe->getIngredient4() ;
$quantite4= $recipe->getquantite4() ;
$ingredient5 = $recipe->getIngredient5() ;
$quantite5= $recipe->getquantite5() ;
$ingredient6 = $recipe->getIngredient6() ;
$quantite6= $recipe->getquantite6() ;

$step1= $recipe->getStep1() ;
$step2= $recipe->getStep2() ;
$step3= $recipe->getStep3() ;
$step4= $recipe->getStep4() ;
$step5= $recipe->getStep5() ;
$step6= $recipe->getStep6() ;
$step7= $recipe->getStep7() ;
$step8= $recipe->getStep8() ;

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
