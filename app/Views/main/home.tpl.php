
<body>
    
    <div>
        <?php 
        if (!empty($errors)){ ?>
            <?php foreach ($errors as $error) {?>
            <li> <?=$error?> </li>
            <?php }  ?>
        <?php } ?>
        <?php 
             if(isset($_SESSION['object'])){
                echo "Bienvenue". $_SESSION['object']->getLogin;
        }
        ?>    
        
    </div>



    <h1> SPEEDY RECETTES</h1>
    <h2> Une famille régalée sans trop (se) dépenser</h2>
    <img src="<?=$BASE_URL."/assets/img/family-lunch.jpg"?>" alt="family eating picture" id="index-picture">
    
    
