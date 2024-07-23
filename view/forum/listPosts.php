<?php
// listPosts.php
$posts  = $data['posts'];
$topics = $data['topics'];
?>

<h1>Liste des posts</h1>

    <?php foreach ($posts as $post): ?>

            <h2><?php $post->getTitle(); ?></h2>
            <p><?php  $post->getText(); ?></p>
            <p> Posté par <?= $post->getUser() ?>  le <?= $post->creationDate() ?></p>
            
    <?php endforeach; ?>
