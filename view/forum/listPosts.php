<?php
// listPosts.php
$topic   = $result["data"]['topic'];
$posts   = $result["data"]['posts'];


?>
<div class="container_posts"> 

    <div class="container_posts_title">
        <p><?= $topic->getTitle(); ?></p>
    </div>

    <?php foreach ($posts as $post): ?>
        <div class="contenu_posts">
            <p><?= $post->getText(); ?></p>
            <p class="container_contenu_posts"> Posté par <b class="user_posts"><?= $post->getUser() ?></b>  le <?= $post->getCreationDate() ?></p>   
        </div>
    <?php endforeach; ?>
</div>    

<div class="container_topics_form"><br>
    <!-- Formulaire pour ajouter un posts -->
    <form class="contenu_topics_form" action="index.php?ctrl=forum&action=addPost&id=<?= $_GET['id'] ?>" method="POST">
        <label for="text">Ajoute ton texte :</label><br>
        <textarea id="text" name="text" rows="8" cols="100"></textarea><br><br>
        <input type='submit' name='submit'>
    </form>
</div>
