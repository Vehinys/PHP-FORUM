<?php

use Model\Entities\Topic;

    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
?>

<h1> Liste des topics </h1>

<?php
foreach($topics as $topic){ 
    ?> <p><a href="index.php?ctrl=forum&action=listTopics&id="> <?= $topic ?> </a> par <?= $topic->getUser() ?> </p> <?php 

    var_dump($topic);
}
