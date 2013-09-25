<div class="tags row">
    <?php foreach($tags as $tag => $number){ ?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <div class="caption">
                    <h3><?php $this->w($tag) ?></h3>
                    <p>
                        <?php $post = $Post->getTagPosts($tag);?>
                    <ul>
                        <?php foreach($post as $p){ ?>
                            <li><a href="<?php echo $this->buildUrl('Post','index',$p['p_id']) ?>"><?php $this->w($p['title']) ?></a></li>
                        <?php } ?>
                    </ul>
                    </p>
                    <p>
                        <a href="<?php echo $this->buildUrl('Tag','index',$tag) ?>" class="btn btn-primary" role="button" title="查看标签页">
                            <span class="glyphicon glyphicon-hand-right"></span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
