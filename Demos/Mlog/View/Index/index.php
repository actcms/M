<div id="post">
    <?php foreach($post as $p){ ?>
        <h1><a href="<?php echo \M\App::buildUrl('Post','index',$p['id']) ?>"><?php echo $p['title'];?></a></h1>
        <p><?php echo date('y-m-d h:m:s',$p['create_time']);?></p>
        <p><?php echo $p['content'];?></p>
        <hr>
    <?php } ?>
</div>