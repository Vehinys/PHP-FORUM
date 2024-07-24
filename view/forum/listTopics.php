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

    <?php } ?>

</div> 

<div><br>
        <!-- Formulaire pour ajouter un posts -->

        <form action="index.php?ctrl=admin&action=addTopics" method="post">

            <label for="title"> Titre du topic : </label><br><br>
            <input type="text" id="title" name="title" /> <br><br>
            <input type='submit' name='submit'> 
            
        </form>
    
</div>


