<?php
    $topics   = $result["data"]['topics']  ; 
?>

<h1> Liste des topics </h1>

<div class="container_topics" > 

    <?php foreach($topics as $topic){  ?> 

        <a class="contenu_topics" href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>">

            <h2 class="title_topic"><?= $topic ?></h2> 
            <div class="p_topic"> Par <b class="user_topic"><?= $topic->getUser() ?></b> Le <?= $topic->getCreationDate();?> </div>

        </a>

    <?php }

?> </div> <?php
