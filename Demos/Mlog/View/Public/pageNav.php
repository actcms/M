<ul class="pagination">
    <li class="disabled"><a href="#">&laquo;</a></li>
    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
    <?php for($i=2;$i<10;$i++){ ?>
        <li><a href="<?php echo \M\App::buildUrl('Index','index',$i) ?>"><?php echo $i ?></a></li>
    <?php } ?>
    <li><a href="#">&raquo;</a></li>
</ul>