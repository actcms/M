<!doctype html>
<html>
<?php include_once APP.'/View/Public/head.php' ?>
<body>
<?php include_once APP.'/View/Public/header.php' ?>
<div class="container">
    <div class="row">
        <div id="main" class="col-md-8">
            <?php include_once APP.'/View/Public/breadcrumb.php' ?>
            <?php include_once $tpl ?>
        </div>
        <div id="side" class="col-md-4">
            <?php include_once APP.'/View/Public/side.php' ?>
        </div>
    </div>
</div>
<?php include_once APP.'/View/Public/footer.php' ?>
</body>
</html>