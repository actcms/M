<div id="post">
    <h3><?php echo $this->data['title'] ?></h3>
    <form action="<?php echo \M\App::buildUrl('Post','add');?>" method="post" id="add-post">
        <input type="text" class="form-control" name="title" placeholder="Input title"><br>
        <textarea name="content" class="form-control" rows="10"></textarea>
        <div class="row">
            <div class="col-md-8">
                <input type="text" name="tags" class="form-control" placeholder="标签之间请用英文','隔开">
            </div>
            <div class="col-md-4">
                <label class="checkbox-inline">
                    <input type="checkbox" name="top" value="1"> 置顶
                </label>
            </div>
        </div>
        <input type="submit" class="btn btn-default pull-right" name="post" value="发布">
    </form>
</div>