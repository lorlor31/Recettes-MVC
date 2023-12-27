

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?=$pageTitle?> </title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=acme:400|maitree:400|rasa:700,700i" rel="stylesheet" />
    <link rel="stylesheet" href="<?=$BASE_URL."/css/recipe.css"?>">
    <link rel="stylesheet" href="<?=$BASE_URL."/css/index.css"?>">

    <nav>
    <?php 
    $recipes = $viewData['recipesList'];
    dump($recipes[0]->getTitre() ) ;
    ?>
    <?php foreach ($recipes as $recipe) { ?>
        <a href=<?=$router->generate('catalog-recettes', ['id' => $recipe->getID()])?>> <?=$recipe->getTitre() ?> </a>
    <?php } ?>
    </nav>