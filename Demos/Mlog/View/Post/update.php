<div id="post">
    <h3><?php echo $title ?></h3>
    <form action="<?php echo \M\App::urlBuild('Post','update') ?>" method="post" id="add-post">
        <input type="text" class="form-control" name="title" placeholder="Input title"><br>
        <textarea name="content" class="form-control" rows="10"></textarea>
        <input type="submit" class="btn btn-default pull-right" name="update" value="发布">
    </form>
</div>
