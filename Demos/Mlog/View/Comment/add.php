<div id="comment">
    <h3>添加评论</h3>
    <form action="<?php $this->w(\M\App::buildUrl('Comment','add'))?>" method="post" id="add-post">
        <input type="hidden" name="postId" value="<?php $this->w($post['p_id'])?>">
        <input type="text" class="form-control" name="username" placeholder="输入昵称" required="required"><br>
        <input type="email" class="form-control" name="email" placeholder="输入邮箱" required="required"><br>
        <textarea name="message" class="form-control" rows="10" required="required"></textarea>
        <input type="submit" class="btn btn-default pull-right" name="comment" value="发布">
    </form>
</div>