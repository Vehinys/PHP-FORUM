<?php
$categories = $result["data"]['categories']; 
?>

<h1>Catégories du forum :</h1>

<div class="container_category">

    <?php foreach($categories as $category) { ?>

        <div class="category_card">

            <a class="contenu_category" href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>">

                <?= $category->getName() ?>

            </a>

        </div>

    <?php } ?>
    
</div>

<?php if(App\Session::isAdmin()) { ?>

<!-- AJOUT DES CATEGORIES -->

<div class="add_category_form">

    <form action="index.php?ctrl=admin&action=addCategory" method="post">

        <label for="name">Ajoute une catégorie :</label>

        <input type="text" id="name" name="name" />

        <input type="submit" name="submit" value="Ajouter" />

    </form>

</div>

<?php } ?>