<!-- Menu des recettes  -->
    <nav class="recipeNav">
    <?php foreach ($recipesList as $recipe) { ?>
        <a href=<?=$router->generate('catalog-recettes', ['id' => $recipe->getID()])?>> <?=$recipe->getTitle() ?> </a>
    <?php } ?>
    </nav>