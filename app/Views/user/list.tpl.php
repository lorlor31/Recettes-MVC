

<ul>

<?php 
    foreach ($users as $user) {?>
        <li><?=$user->getLogin()?></li>
    <?php } ?>
</ul>