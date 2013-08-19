<div id="post">
    <h3><?php echo $title ?></h3>
    <form action="<?php echo \M\App::buildUrl('Post','add');?>" method="post" id="add-post">
        <input type="text" class="form-control" name="title" placeholder="Input title"><br>
        <textarea name="content" class="form-control" rows="10"></textarea>
        <input type="text" name="tags" class="form-control" placeholder="标签之间请用英文','隔开">
        <input type="submit" class="btn btn-default pull-right" name="post" value="发布">
    </form>
</div>