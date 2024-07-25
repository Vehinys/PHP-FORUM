<?php
$users     = $result["data"]['user'];  

?>

<h1> Liste des membres :</h1>

<div class="container_users" > 
    <?php foreach($users as $user){  ?> 
            <h2 class="nickName_user"><?= $user->getNickName() ?></h2> 
        </a>
    <?php } ?>
</div> 