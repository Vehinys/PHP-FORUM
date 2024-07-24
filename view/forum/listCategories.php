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
        <!-- Formulaire pour ajouter un nouveau genre -->

        <form action="index.php?ctrl=admin&action=addCategory" method="post">

            <label for="name"> Ajoute une catégorie : </label>
            <input type="aria" id="name" name="name" /> 

            <input type='submit' name='submit'> 
            
        </form>
    
</div>
