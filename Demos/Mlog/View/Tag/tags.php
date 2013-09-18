<div class="tags row">
    <?php foreach($tags as $tag => $number){ ?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img data-src="holder.js/300x200" alt="...">
                <div class="caption">
                    <h3><?php echo $tag ?></h3>
                    <p>
                        <?php $post = $Post->getTagPosts($tag);?>
                    <ul>
                        <?php foreach($post as $p){ ?>
                            <li><?php echo $p['title'] ?></li>
                        <?php } ?>
                    </ul>
                    </p>
                    <p><a href="<?php echo \M\App::buildUrl('Tag','index',$tag) ?>" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
