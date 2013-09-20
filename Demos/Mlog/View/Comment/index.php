<div class="comment col-md-offset-2">
    <?php foreach($comment as $c){ ?>
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="<?php echo APP.'/Public/img/user.png'?>" width="64px" height="64px" alt="...">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><?php echo $c['username']?></h4>
            <p><?php echo $c['message']?></p>
        </div>
    </div>
    <hr>
    <?php } ?>
</div>
