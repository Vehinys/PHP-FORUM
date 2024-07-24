<?php
    $categories = $result["data"]['categories']; 
?>

<div class="container_category">

    <?php foreach($categories as $category) { ?>

        <p>

            <a class="contenu_category" href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>">
                <?= $category->getName() ?>
            </a>
        </p>

    <?php } ?>

</div>

<div><br>
    <form action="index.php?ctrl=admin&action=addCategory" method="post">
        <label for="addCategory">Ajoute une catégorie : </label><br><br>
        <input required type="text" name="categoryName">
        <input type='submit' value ='Ajouter'>
    </form>
</div>




  
