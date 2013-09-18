<div class="tag panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-tags"> 标签</span></h3>
    </div>
    <div class="panel-body">
        <?php foreach($tags as $tag => $number){ ?>
            <a href="<?php echo \M\App::buildUrl('Tag','index',$tag) ?>"><?php echo $tag ?> <span class="badge"><?php echo $number ?></span></a>&nbsp
        <?php } ?>
    </div>
</div>