<?php
// listPosts.php
$topic   = $result["data"]['topic'];
$posts   = $result["data"]['posts'];
?>
<div class="container_posts"> 

        <div class="container_posts_title">

            <p><?= $topic->getTitle(); ?></p>

        </div> 

        <div class="contenu_posts">

            <?php foreach ($posts as $post): ?>

            <p><?= $post->getText(); ?></p>

            <p> Posté par <?= $post->getUser() ?>  le <?= $post->getCreationDate() ?></p>

            <?php endforeach; ?>

        </div> 
        
</div>    
