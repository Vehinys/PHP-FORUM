<?php
    $categories = $result["data"]['categories']; 

?>
<div class="container_category">
<?php

foreach($categories as $category){ ?>
    <p><a class="contenu_category" href="index.php?ctrl=forum&action=listTopicsByCategory&id="<?= $category->getId() ?>"><?= $category->getName() ?></a></p>
<?php }

?>
</div>
<?php




  
