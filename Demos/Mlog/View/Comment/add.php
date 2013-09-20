<div id="comment">
    <h3><?php echo $this->data['title'] ?></h3>
    <form action="<?php echo \M\App::buildUrl('Comment','add');?>" method="post" id="add-post">
        <input type="hidden" name="postId" value="<?php echo $postId ?>">
        <input type="text" class="form-control" name="username" placeholder="输入昵称"><br>
        <input type="email" class="form-control" name="email" placeholder="输入邮箱"><br>
        <textarea name="message" class="form-control" rows="10"></textarea>
        <input type="submit" class="btn btn-default pull-right" name="comment" value="发布">
    </form>
</div>