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
                <h4>recent post</h4>
                <ul>
                    <li><a href="">some time need</a></li>
                    <li><a href="">hello world</a></li>
                    <li><a href="">how about you</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php include_once 'View/Public/footer.php' ?>
</body>
</html>