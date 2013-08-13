<div id="reg">
    <form action="<?php echo \M\App::urlBuild('Index','reg');?>" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="rePassword">RePassword</label>
            <input type="password" name="rePassword" id="rePassword" class="form-control">
        </div>
        <input type="submit" name="reg" class="btn btn-default pull-right" value="注册">
    </form>
</div>