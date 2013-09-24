<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php $this->w(\M\App::getHomeUrl())?>">Mlog</a>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?php $this->w(\M\App::getHomeUrl())?>">文章</a></li>
            <li><a href="<?php $this->w(\M\App::buildUrl('Tag','tags'))?>">标签</a></li>
        </ul>
        <form class="navbar-form navbar-left" role="search" action="<?php $this->w(\M\App::buildUrl('Search','index'))?>" method="post">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="搜索">
            </div>
        </form>
        <ul class="nav navbar-nav">
            <?php if(isset($_SESSION['user'])){ ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">New <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php $this->w(\M\App::buildUrl('Post','add')) ?>">Post</a></li>
                    </ul>
                </li>
                <li><a href="<?php $this->w(\M\App::buildUrl('Post','add')) ?>"><span class="glyphicon glyphicon-plus">撰写</span></a></li>
            <?php } ?>

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="mailto:imaguowei@gmail.com" title="意见反馈"><span class="glyphicon glyphicon-envelope"></span></a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user"> <?php $this->w(isset($_SESSION['user']['username'])?'hello '.$_SESSION['user']['username']:'')?></span> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <?php if(empty($_SESSION['user'])){ ?>
                        <li><a href="<?php $this->w(\M\App::buildUrl('Index','login')) ?>"> 登录</a></li>
                        <li><a href="<?php $this->w(\M\App::buildUrl('Index','reg')) ?>"> 注册</a></li>
                    <?php } ?>
                    <?php if(isset($_SESSION['user'])){ ?>
                        <li>
                            <a href="<?php $this->w(\M\App::buildUrl('User','index',$_SESSION['user']['username'])) ?>">
                                <span class="glyphicon glyphicon-home"> 我的主页</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php $this->w(\M\App::buildUrl('User','user')) ?>">
                                <span class="glyphicon glyphicon-th-large"> 后台管理</span>
                            </a>
                        </li>
                        <li><a href="#"><span class="glyphicon glyphicon-cog"> 设置</span></a></li>
                        <li>
                            <a href="<?php $this->w(\M\App::buildUrl('Index','logout')) ?>">
                                <span class="glyphicon glyphicon-off"> 退出登录</span>
                            </a
                        </li>
                    <?php } ?>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>