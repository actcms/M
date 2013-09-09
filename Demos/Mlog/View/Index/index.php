<div id="post" class="list-group">
    <?php foreach($post as $p){ ?>
        <div class="article">
            <a href="<?php echo \M\App::buildUrl('Post','index',$p['id']) ?>" class="list-group-item <?php echo $p['top']?'active':''?>">
                <hgroup>
                    <h1 class="list-group-item-heading"><?php echo $p['title'];?></h1>
                    <h5><?php echo date('y-m-d h:m:s',$p['create_time']);?></h5>
                </hgroup>
                <hr>
                <p class="list-group-item-text"><?php echo $p['content'];?>...</p>
            </a>
        </div>
    <?php } ?>
</div>
<div id="pageNav">
    <?php include_once APP.'/View/Public/pageNav.php'?>
</div>
