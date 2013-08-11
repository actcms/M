<div id="post">
    <h3>add Post</h3>
    <form action="<?php echo \M\App::urlBuild('Post','add');?>" method="post" id="add-post">
        <input type="text" class="form-control" name="title" placeholder="Input title"><br>
        <textarea name="content" class="form-control" rows="10"></textarea>
        <input type="submit" class="btn btn-default pull-right" name="post" value="发布">

    </form>
</div>