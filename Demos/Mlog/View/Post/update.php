<div id="post">
    <h3><?php echo $this->data['title'] ?></h3>
    <form action="<?php echo \M\App::buildUrl('Post','update') ?>" method="post" id="add-post">
        <input type="hidden" name="pid" value="<?php echo $post['p_id'] ?>">
        <input type="text" class="form-control" name="title" value="<?php echo $post['title'] ?>" placeholder="Input title"><br>
        <textarea name="content" class="form-control" rows="10"><?php echo $post['content'] ?></textarea>
        <div class="row">
            <div class="col-md-8">
                <input type="text" name="tags" class="form-control" value="<?php echo $post['tags'] ?>" placeholder="标签之间请用英文','隔开">
            </div>
            <div class="col-md-4">
                <label class="checkbox-inline">
                    <input type="checkbox" name="top" value="1" <?php echo $post['top']?'checked':''?>> 置顶
                </label>
            </div>
        </div>
        <input type="submit" class="btn btn-default pull-right" name="update" value="更新">
    </form>
</div>
