<ul class="pagination">
    <li class="disabled"><a href="<?php echo \M\App::buildUrl('Index','index',0) ?>">&laquo;</a></li>
    <?php for($i=1;$i<$page;$i++){ ?>
        <li><a href="<?php echo \M\App::buildUrl('Index','index',$i) ?>"><?php echo $i ?></a></li>
    <?php } ?>
    <li><a href="<?php echo \M\App::buildUrl('Index','index','') ?>">&raquo;</a></li>
</ul>