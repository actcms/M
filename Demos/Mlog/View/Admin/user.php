<ul class="nav nav-pills nav-justified">
    <li class="active"><a href="<?php echo $this->buildUrl('Admin','user') ?>">用户管理</a></li>
    <li><a href="<?php echo $this->buildUrl('Admin','index') ?>">系统信息</a></li>
    <li><a href="<?php echo $this->buildUrl('Admin','setting') ?>">系统设置</a></li>
</ul>
<div class="panel panel-default">
    <div class="panel-heading">用户列表</div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>用户ID</th><th>用户名</th><th>邮箱</th><th>管理</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($user as $u){ ?>
            <tr>
                <td><?php $this->w($u['u_id'])?></td>
                <td><?php $this->w($u['username'])?></td>
                <td><?php $this->w($u['email'])?></td>
                <td>
                    <a href="<?php echo $this->buildUrl('Admin','delete',$u['u_id']) ?>">
                        <span class="glyphicon glyphicon-trash" title="删除"></span>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

