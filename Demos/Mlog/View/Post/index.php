<div id="post" class="panel panel-info">
    <div class="panel-heading">
        <h1 class="panel-title">
            <a href="<?php $this->w(\M\App::buildUrl('Post','index',$post['p_id'])) ?>"><?php $this->w($post['title'])?></a>
            <a class="pull-right">
                <?php ?>
                <span class="glyphicon glyphicon-calendar" title="发布时间">
                    <?php $this->w(date('y-m-d',$post['create_time']))?>
                </span>&nbsp
                <span class="glyphicon glyphicon-user" title="作者"><?php $this->w($post['username'])?></span>&nbsp
                <span class="glyphicon glyphicon-comment"></span>
            </a>
        </h1>
    </div>
    <div class="panel-body">
        <p><?php $this->w($post['content']) ?></p>
    </div>
    <div class="panel-footer">
        <div class="row">
            <span class="col-md-8">
            <?php foreach(explode(',',$post['tags']) as $tag) {?>
                <a href="<?php $this->w(\M\App::buildUrl('Tag','index',$tag)) ?>">
                    <span class="glyphicon glyphicon-tags"> <?php $this->w($tag) ?></span>
                </a>
            <?php } ?>
            </span>
            <a href="" class="col-md-2 show-comment" id="<?php $this->w($post['p_id'])?>"><span class="glyphicon glyphicon-comment"></span></a>
        </div>
    </div>
</div>
<div class="add-comment" id="<?php $this->w($post['p_id'])?>">
    <?php include_once APP.'/View/Comment/add.php'?>
</div>
<hr>
<div class="comment">

</div>
<hr>
<div id="pageNav">
    <ul class="pager">
        <li class="previous"><a href="<?php $this->w(\M\App::buildUrl('Post','index',$page-1))?>">&larr; Older</a></li>
        <li class="next"><a href="<?php $this->w(\M\App::buildUrl('Post','index',$page+1))?>">Newer &rarr;</a></li>
    </ul>
</div>