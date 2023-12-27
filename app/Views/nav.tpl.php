<nav>
    <?php foreach ($recipes as $recipe) { ?>
        <a href="index.php?id=<?= $recipe['id'] ?>"><?=$recipe['titre']?> </a>
    <?php } ?>
</nav>