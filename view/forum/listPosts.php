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
