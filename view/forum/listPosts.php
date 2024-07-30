<?php
// listPosts.php
$topic      = $result["data"]['topic'];
$posts      = $result["data"]['posts'];
?>

<!-- LISTE DES POSTS -->

<div class="container_posts"> 
    <div class="container_posts_title">
        <p><?= $topic->getTitle(); ?> </p>
    </div>
    <?php foreach ($posts as $post): ?>
        <div class="contenu_posts">
            <p><?= $post->getText(); ?></p>
            <p class="container_contenu_posts"> Posté par <b class="user_posts"><?= $topic->getUser()->getPseudo()?></b>  le <?= $post->getCreationDate() ?></p>   
        </div>
    <?php endforeach; ?>
</div>    

<!-- AJOUT DES POSTS -->

<?php if(App\Session::getUser()) { ?>

<div class="container_posts_form"><br>
    <!-- Formulaire pour ajouter un posts -->
    <form class="contenu_posts_form" action="index.php?ctrl=forum&action=addPost&id=<?=$_GET['id']?>" method="POST">
        <label for="text">Ajoute ton texte :</label><br>
        <textarea id="text" name="text" rows="7" cols="70"></textarea><br><br>
        <input type='submit' name='submit'>
    </form>
</div>

<?php } ?>