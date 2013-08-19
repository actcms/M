<div id="post">
    <h3><?php echo $title ?></h3>
    <form action="<?php echo \M\App::buildUrl('Post','update') ?>" method="post" id="add-post">
        <input type="hidden" name="id" value="<?php echo $post['id'] ?>">
        <input type="text" class="form-control" name="title" value="<?php echo $post['title'] ?>" placeholder="Input title"><br>
        <textarea name="content" class="form-control" rows="10"><?php echo $post['content'] ?></textarea>
        <input type="text" name="tags" class="form-control" value="<?php echo $post['tags'] ?>" placeholder="标签之间请用英文','隔开">
        <input type="submit" class="btn btn-default pull-right" name="update" value="发布">
    </form>
</div>
