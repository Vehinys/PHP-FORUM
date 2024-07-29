<?php
$topics = $result["data"]['topics'];
?>

<h1 >BIENVENUE SUR LE FORUM</h1>

<p class="home_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ut nemo quia voluptas numquam, 
                    itaque ipsa soluta ratione eum temporibus aliquid, facere rerum in laborum debitis labore aliquam ullam cumque.</p>

<div class="container_home" >

<?php  // Affichage des 5 derniers topics enregistrés sur le forum 

        foreach($topics as $topic) { ?>
            <a class="contenu_home" href="index.php?ctrl=forum&action=listPostsByTopic&id=<?=$topic->getId()?>">
                <div class="contenu_home_information">
                    <h2 class="title_home"><?=$topic->getTitle()?></h2>
                    <div class="p_topic" ><p>Crée par <b><?= $topic->getUser() ?></b>, le <?= $topic->getCreationDate();?></p></div>
                </div>
            </a>
        <?php } ?>
</div>