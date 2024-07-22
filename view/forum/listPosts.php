<?php
    $category = $result["data"]['category']; 
    $posts = $result["data"]['posts']; 
?>

<h1>Liste des Posts</h1>

<?php
foreach($posts as $post ){ 
    ?> <p><a href="index.php?ctrl=forum&action=listPosts&id="> <?= $post ?> </a> par <?= $post->getUser() ?> </p> <?php 
}