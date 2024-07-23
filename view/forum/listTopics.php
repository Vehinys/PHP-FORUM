<?php
    $category = $result["data"]['category']; 
    $topics   = $result["data"]['topics']  ; 
?>

<h1> Liste des topics </h1>

<?php
foreach($topics as $topic){ 

    ?> 
    
    <p>
        
        <a class="contenu_topic" href="index.php?ctrl=forum&action=listTopics&id=<?= $topic->getId() ?>">
            
        <?= $topic ?> 
        
        par 
        
        <?= $topic->getUser() ?> 

    </a>
    
    </p>
    
    <?php 
}
