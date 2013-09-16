<div id="post" class="panel panel-info">
    <div class="panel-heading">
        <h1 class="panel-title">
            <a href="<?php \M\App::buildUrl('Post','index',$post['id']) ?>"><?php echo $post['title'] ?></a>
            <a class="pull-right">
                <?php ?>
                <span class="glyphicon glyphicon-calendar" title="发布时间"><?php echo date('y-m-d',$post['create_time']);?></span>
                <span class="glyphicon glyphicon-user" title="作者"> <?php echo $post['username'];?></span>
            </a>
        </h1>
    </div>
    <div class="panel-body">
        <p><?php echo $post['content'] ?></p>
    </div>
    <div class="panel-footer">
        <div class="row">
            <?php foreach(explode(',',$post['tags']) as $tag) {?>
                <a href="<?php echo \M\App::buildUrl('Tag','index',$tag) ?>" class="col-md-10"><span class="glyphicon glyphicon-tags"> <?php echo $tag ?></span></a>
            <?php } ?>
            <a href="" class="col-md-1"><span class="glyphicon glyphicon-thumbs-down"></span></a>
            <a href="" class="col-md-1"><span class="glyphicon glyphicon-thumbs-up"></span></a>
        </div>
    </div>
</div>
<div id="pageNav">
    <ul class="pager">
        <li class="previous"><a href="<?php echo \M\App::buildUrl('Post','index',$page-1)?>">&larr; Older</a></li>
        <li class="next"><a href="<?php echo \M\App::buildUrl('Post','index',$page+1)?>">Newer &rarr;</a></li>
    </ul>
</div>