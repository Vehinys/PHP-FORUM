<?php
// listPosts.php
$posts = $data['posts'];
?>

<h1>Liste des posts</h1>

    <?php foreach ($posts as $post): ?>

            <h2><?php $post->getTitle(); ?></h2>
            <p><?php  $post->getText(); ?></p>
            <p><small> Posté par <?= $post->getUser() ?>  le <?= $post->creationDate() ?> </small></p>
            
    <?php endforeach; ?>
