<div id="sidebar" >
    <h1>Sidebar Menu</h1>
    <ul class="sidemenu">
        <?php if(isset($categories) && count($categories) > 0):?>
            <?php foreach($categories as $category):?>
                <li><a href="#"><?php echo $category['Category']['name']?></a></li>
            <?php endforeach?>
        <?php endif;?>
    </ul>
</div>