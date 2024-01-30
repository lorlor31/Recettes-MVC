<?php

//pourquoi j'arrive à récupérer les propriétés de la recette $recipe qui est censése sappeler
//currentRecipe ???
//dump($viewData) ;
$title = $currentRecipe->getTitle() ;
$picture= $currentRecipe->getPicture() ;
$persons= $currentRecipe->getPersons() ;


?>

 <main>

 <h1> <?= $title ?> </h1>
        
<section class="section" id="firstPart">
        <div class="picture">
            <h2>
                <?= $title?> pour
                <span class="numOfPers" data-persons= <?=$persons?> > <?=$persons?> </span>
                <?= require __DIR__ ."/../layout/toggleEditionButton.tpl.php"; ?>
    
                <label class="numOfPersLabel invisible" for="numOfPersInput" > <label>
                <form>
                <input class="numOfPersInput invisible" data-persons= <?=$persons?> type="number" 
                name="numOfPersInput" value=<?= $persons?> > </input>
                </form>
                personnes
            </h2>
            <img src="<?=$BASE_URL."/assets/img/$picture"?>"/>
        </div>

        <div class="ingredients">
            <ul>
                <?php foreach ($ingredients_list as $ingredient) { ?>
                 <li> 
                        <span class="ingredient"> <?=$ingredient['name']?> :  </span>
                        <span class="amount" data-amount= <?= $ingredient['amount']?>> <?= $ingredient['amount']?></span>
                        <span class="unit" data-amount= <?= $ingredient['unit']?>> <?=$ingredient['unit']?> </span>
                </li>
                <?php } ?>
            </ul>
        </div>

    </section>

    <section class="section" id="etapes">
        <h2> Etapes de la recette </h2>
        <p>
            <ol>
            <?php foreach ($steps as $step){?>
                <li><?=$step->getDescription()?> </li>
            <?php }?>
            </ol>
        </p>
    </section>

    <section class="section" id="commentaires">
        <h2> Commentaires </h2>
        
        <?php foreach ($comments as $comment) { ?>
                <li><?=$comment->getUser_login()?> a écrit : <span><?=$comment->getComment()?></span>  </li>
        <?php }?>
        
    </section>
</main>
