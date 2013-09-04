<div id="login" class="col-md-5 col-md-offset-4">
    <form action="<?php echo \M\App::buildUrl('Index','login'); ?>" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Input username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Input password">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox"> Remember me
            </label>
        </div>
        <input type="submit" name="login" class="btn btn-default pull-right">
    </form>
</div>