<div class="list-group">
    <a class="list-group-item active"><span class="glyphicon glyphicon-list"> 最新发布</span></a>
    <?php foreach($recentPost as $p){ ?>
        <a  class="list-group-item" href="<?php echo \M\App::buildUrl('Post','index',$p['id']) ?>"><?php echo $p['title'] ?></a>
    <?php } ?>
</div>

