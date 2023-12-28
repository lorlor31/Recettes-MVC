<?php require __DIR__.'/../Models/User.php' ?>

<body>
    <a href="./datasFromDb.php">datasFromDb</a>
    <h1> SPEEDY RECETTES</h1>
    <h2> Une famille régalée sans trop (se) dépenser</h2>
    <img src="<?=$BASE_URL."/assets/img/family-lunch.jpg"?>" alt="family eating picture" id="index-picture">
    <form action="" method="GET">
        <label for="login">Login</label>
        <input type="text" name="login" id="login" value=<?=$login?>>
        <label for="pwd">Password</label>
        <input type="text" name="pwd" id="pwd">
        <button>Connexion</button>
    </form>
    <p> <?=$message?></p>
