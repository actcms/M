<div class="tag panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-tags"> 标签</span></h3>
    </div>
    <div class="panel-body">
        <?php foreach($tags as $tag => $number){ ?>
            <a href="<?php echo $this->buildUrl('Tag','index',$tag) ?>"><?php $this->w($tag) ?> <span class="badge"><?php $this->w($number) ?></span></a>&nbsp
        <?php } ?>
    </div>
</div>