<!doctype html>
<html>
    <?php include_once 'View/Public/head.php' ?>
<body>
    <?php include_once 'View/Public/header.php' ?>
    <div class="container">
        <div class="row">
            <div id="main" class="col-lg-8">
                <?php include_once $tpl ?>
            </div>
            <div id="side" class="col-lg-4">
                <?php include_once 'View/Public/side.php' ?>
            </div>
        </div>
    </div>
    <?php include_once 'View/Public/footer.php' ?>
</body>
</html>