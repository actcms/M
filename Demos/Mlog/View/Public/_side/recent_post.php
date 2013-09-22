<div class="recent-post panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-list"> 近期发布</span></h3>
    </div>
    <div class="panel-body">
        <p>...</p>
    </div>
    <ul class="list-group">
        <?php foreach($recentPost as $p){ ?>
            <li class="list-group-item">
                <a href="<?php echo \M\App::buildUrl('Post','index',$p['p_id']) ?>"><?php echo $p['title'] ?> <span class="badge" title="评论数目"><?php echo $p['commentNumber']?></span></a>
            </li>
        <?php } ?>
    </ul>
</div>