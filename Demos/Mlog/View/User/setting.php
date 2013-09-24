<ul class="nav nav-pills nav-justified">
    <li><a href="<?php $this->w(\M\App::buildUrl('User','post')) ?>">文章管理</a></li>
    <li><a href="<?php $this->w(\M\App::buildUrl('User','user')) ?>">账户信息</a></li>
    <li class="active"><a href="<?php $this->w(\M\App::buildUrl('User','setting')) ?>">账户设置</a></li>
</ul>
<div class="setting">
    <form class="form-horizontal" role="form" action="<?php $this->w(\M\App::buildUrl('User','setting'))?>" method="post">
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">用户名</label>
            <div class="col-sm-10">
                <input type="text" name="username" class="form-control" id="username" value="<?php $this->w($user['username']) ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">邮箱</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="email" value="<?php $this->w($user['email']) ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="password" value="<?php $this->w($user['password']) ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="setting" class="btn btn-default" value="保存修改">
            </div>
        </div>
    </form>
</div>