
<body>
    <div>
        <form action="" method="GET">
            <h2> <?=!empty($_SESSION) 
            ?  $_SESSION['login'] . 'est connecté'
            :  "Connectez-vous !";?>
            </h2>
            <label for="login">Login</label>
            <input type="text" name="login" id="login" value="" placeholder="login">
            <label for="pwd">Password</label>
            <input type="text" name="pwd" id="pwd">
            <button>Connexion</button>
        </form>
    </div>
    <h1> SPEEDY RECETTES</h1>
    <h2> Une famille régalée sans trop (se) dépenser</h2>
    <img src="<?=$BASE_URL."/assets/img/family-lunch.jpg"?>" alt="family eating picture" id="index-picture">
    
    <p> php$messagephp </p> 
