<?php
$users = $result["data"]['user'];  
?>

<h1>Liste des membres :</h1>

<div class="container_users"> 
    <?php foreach($users as $user) { ?> 
        <div class="nickName_user">
            <h2><?= $user->getPseudo() ?></h2>
        </div>
    <?php } ?>
</div>