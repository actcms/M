<header>
    <div class="container">
        <div class="page-header">
            <div class="log">
                <h1><a href="<?php echo \M\App::getHomeUrl();?>"><?php echo $app['name'] ?></a><small> <?php echo $app['info'] ?></small></h1>
            </div>
        </div>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo \M\App::getHomeUrl()?>">Home</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">日志</a></li>
                    <li><a href="#">笔记</a></li>
                    <li><a href="<?php echo \M\App::buildUrl('Tag','tags')?>">标签</a></li>
                    <li><a href="#">关于</a></li>
                </ul>
                <form class="navbar-form navbar-left" role="search" action="<?php echo \M\App::buildUrl('Search','index')?>" method="post">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="搜索">
                    </div>
                </form>
                <ul class="nav navbar-nav">
                    <?php if(isset($_SESSION['username'])){ ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">New <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo \M\App::buildUrl('Post','add')?>">Post</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo \M\App::buildUrl('Post','add')?>"><span class="glyphicon glyphicon-plus">撰写</span></a></li>
                    <?php } ?>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-envelope"></span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"> <?php echo isset($_SESSION['username'])?'hello '.$_SESSION['username']:''?></span> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo \M\App::buildUrl('Index','Login')?>">Login</a></li>
                            <li><a href="<?php echo \M\App::buildUrl('Index','logout')?>">Logout</a></li>
                            <li><a href="#">Setting</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>
</header>
