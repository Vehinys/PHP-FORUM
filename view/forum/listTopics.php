<?php
$topics = $result["data"]['topics'];   
?>

<!-- LISTE DES TOPICS -->

<div class="container_topics" > 
    <?php foreach($topics as $topic){  ?> 
        <a class="contenu_topics" href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>">
            <h2 class="title_topic"><?= $topic ?></h2> 
            <div class="p_topic"> Par <b class="user_topic"><?= $topic->getUser()->getPseudo()?></b> Le <?= $topic->getCreationDate();?> </div>
        </a>
    <?php } ?>
</div> 

<!-- AJOUT DES TOPICS -->

<?php if(App\Session::getUser()) { ?>
<div class="container_topics_form"><br>
    <!-- Formulaire pour ajouter un posts -->
    <form class="contenu_topics_form" action="index.php?ctrl=forum&action=addTopic&id=<?=$_GET['id']?>" method="POST">
        <label for="title">Titre du topic :</label><br>
        <input type="text" id="title" name="title" /><br><br>
        <label for="text">Ajoute ton texte :</label><br>
        <textarea id="text" name="text" rows="8" cols="80"></textarea><br><br>
        <input type='submit' name='submit'>
    </form>
</div>
<?php } ?>