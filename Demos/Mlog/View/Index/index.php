<div id="post" class="list-group">
    <?php foreach($post as $p){ ?>
        <a href="<?php echo \M\App::buildUrl('Post','index',$p['id']) ?>" class="list-group-item">
            <h1 class="list-group-item-heading"><?php echo $p['title'];?><?php echo date('y-m-d h:m:s',$p['create_time']);?></h1>
            <p class="list-group-item-text"><?php echo $p['content'];?>...</p>
        </a>
    <?php } ?>
</div>
<div id="pageNav">
    <?php include_once APP.'/View/Public/pageNav.php'?>
</div>
