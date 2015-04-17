<?php if(isset($article)):?>
    <h1><?php echo $article['Article']['title']?></h1>
    <p><?php echo $article['Article']['description']?></p>
    <span><?php echo $article['Article']['content']?></span>
<?php else:?>
    <?php echo __('data empty')?>
<?php endif?>