<ul class="nav nav-pills nav-justified">
    <li><a href="<?php echo \M\App::buildUrl('User','post') ?>">文章管理</a></li>
    <li><a href="<?php echo \M\App::buildUrl('User','user') ?>">账户信息</a></li>
    <li class="active"><a href="<?php echo \M\App::buildUrl('User','setting') ?>">账户设置</a></li>
</ul>
<div class="setting">
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">用户名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="username" value="<?php echo $user['username'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">邮箱</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" value="<?php echo $user['email'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" value="<?php echo $user['password'] ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-default" value="保存修改">
            </div>
        </div>
    </form>
</div>