<ul class="nav nav-pills nav-justified">
    <li><a href="<?php echo $this->buildUrl('Admin','user') ?>">用户管理</a></li>
    <li class="active"><a href="<?php echo $this->buildUrl('Admin','index') ?>">系统信息</a></li>
    <li><a href="<?php echo $this->buildUrl('Admin','setting') ?>">系统设置</a></li>
</ul>
<div class="panel panel-default">
    <div class="panel-heading">系统信息</div>
    <ul class="list-group">
        <li class="list-group-item"><strong>PHP_VERSION</strong> : <?php echo PHP_VERSION ?></li>
        <li class="list-group-item"><strong>PHP_OS</strong> : <?php echo PHP_OS ?></li>
        <li class="list-group-item"><strong>SERVER_ADDR</strong> : <?php echo $_SERVER['SERVER_ADDR'] ?></li>
        <li class="list-group-item"><strong>SERVER_NAME</strong> : <?php echo $_SERVER['SERVER_NAME'] ?></li>
        <li class="list-group-item"><strong>DOCUMENT_ROOT</strong> : <?php echo $_SERVER['DOCUMENT_ROOT'] ?></li>
        <li class="list-group-item"><strong>REMOTE_ADDR</strong> : <?php echo $_SERVER['REMOTE_ADDR'] ?></li>
    </ul>
</div>