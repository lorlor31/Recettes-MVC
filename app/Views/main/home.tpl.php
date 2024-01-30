
<body>
    
    <div>
        <?php 
        if (!empty($errors)){ ?>
            <?php foreach ($errors as $error) {?>
            <li class="errorMessage"> <?=$error?> </li>
            <?php }  ?>
        <?php } ?>
        <?php 
             if(isset($_SESSION['object'])){
                echo "Bienvenue". $_SESSION['object']->getLogin;
        }
        ?>    
        
    </div>

    <h2> Une famille régalée sans trop (se) dépenser</h2>
    <img src="<?=$BASE_URL."/assets/img/family-lunch.jpg"?>" alt="family eating picture" id="index-picture">
    <?php require __DIR__ ."/../layout/recipeNav.tpl.php"; ?> 

    
    
