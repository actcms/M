<div id="login" class="col-md-5 col-md-offset-4">
    <form action="<?php echo $this->buildUrl('Index','login'); ?>" method="post">
        <div class="form-group">
            <label for="username">用户名</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="请在此输入您的用户名" required="required">
        </div>
        <div class="form-group">
            <label for="password">密码</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="请在此输入您的密码" required="required">
        </div>
        <input type="submit" name="login" class="btn btn-primary btn-lg btn-block">
    </form>
</div>