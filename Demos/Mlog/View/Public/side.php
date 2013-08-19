<h4>recent post</h4>
<ul>
    <?php foreach($recentPost as $p){ ?>
        <li><a href="<?php echo \M\App::buildUrl('Post','index',$p['id']) ?>"><?php echo $p['title'] ?></a></li>
    <?php } ?>
</ul>

