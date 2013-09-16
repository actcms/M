<div id="post" class="list-group">
    <?php foreach($post as $p){ ?>
        <div class="article">
            <a href="<?php echo \M\App::buildUrl('Post','index',$p['id']) ?>" class="list-group-item <?php echo $p['top']?'active':''?>">
                <hgroup>
                    <h1 class="list-group-item-heading">
                        <?php echo $p['title'];?>
                        <small class="pull-right">
                            <span class="glyphicon glyphicon-user" title="作者"> <?php echo $p['username'];?></span>
                        </small>
                    </h1>
                    <h5><span class="glyphicon glyphicon-calendar" title="发布时间"> <?php echo date('y-m-d h:m:s',$p['create_time']);?></span></h5>
                </hgroup>
                <hr>
                <p class="list-group-item-text"><?php echo \M\Base\Text::substr($p['content'],0,200);?>……</p>
            </a>
        </div>
    <?php } ?>
</div>
<div id="pageNav">
    <?php include_once APP.'/View/Public/pageNav.php'?>
</div>
