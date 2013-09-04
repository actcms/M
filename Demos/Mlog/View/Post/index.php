<div id="post" class="panel panel-info">
    <div class="panel-heading">
        <h1 class="panel-title">
            <a href="<?php \M\App::buildUrl('Post','index',$post['id']) ?>"><?php echo $post['title'] ?></a>
        </h1>
    </div>
    <div class="panel-body">
        <p><?php echo $post['content'] ?></p>
    </div>
    <div class="panel-footer">
        <span class="glyphicon glyphicon-tags"> <?php echo $post['tags']?></span>
    </div>
</div>
<div id="pageNav">
    <ul class="pager">
        <li class="previous"><a href="#">&larr; Older</a></li>
        <li class="next"><a href="#">Newer &rarr;</a></li>
    </ul>
</div>