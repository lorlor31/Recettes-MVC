

<ul>
Liste des utilisateurs
<?php 
    foreach ($users as $user) {?>
        <li>
            <span> <?=$user->getLogin()?></span>
            <a href=<?= $this->router->generate('user-update', ['id' => $user->getId()]) ?>> Modifier </a>
            <a href=<?= $this->router->generate('user-delete', ['id' => $user->getId()]) ?>> Supprimer </a>
        </li>
    <?php } ?>
</ul>