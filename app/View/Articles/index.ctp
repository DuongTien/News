<?php if(isset($articles) && count($articles > 0)):?>
    <?php foreach($articles as $article):?>
        <div class="item-article">
        <h1><?php echo $this->Html->link($article['Article']['title'],array('controller' => 'articles', 'action' => 'detail', $article['Article']['id']))?></h1>
        <p><?php echo $article['Article']['description']?></p>
        </div>
    <?php endforeach;?>
<?php else:?>
    <span>data is empty</span>
<?php endif;?>