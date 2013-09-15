<div class="recent-post panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-list"> Recent Post</span></h3>
    </div>
    <div class="panel-body">
        <p>...</p>
    </div>
    <ul class="list-group">
        <?php foreach($recentPost as $p){ ?>
            <li class="list-group-item"><a href="<?php echo \M\App::buildUrl('Post','index',$p['id']) ?>"><?php echo $p['title'] ?></a></li>
        <?php } ?>

    </ul>
</div>
<div class="tag panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-tags"> Tag</span></h3>
    </div>
    <div class="panel-body">
        <?php foreach($tags as $tag => $number){ ?>
            <a href="<?php echo \M\App::buildUrl('Tag','index',$tag) ?>"><?php echo $tag ?> <span class="badge"><?php echo $number ?></span></a>&nbsp
        <?php } ?>
    </div>
</div>

