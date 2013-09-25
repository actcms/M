<div class="comment col-md-offset-2">
    <?php foreach($comment as $c){ ?>
    <div class="media">
        <a class="pull-left" href="<?php echo $this->buildUrl('Post','index',$c['post_id'])?>">
            <img class="media-object" src="<?php $this->w(APP.'/Public/img/user.png')?>" width="64px" height="64px" alt="...">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><?php $this->w($c['username'])?></h4>
            <p><?php $this->w($c['message'])?></p>
        </div>
    </div>
    <hr>
    <?php } ?>
</div>
