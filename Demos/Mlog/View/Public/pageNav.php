<ul class="pagination">
    <li class="disabled"><a href="<?php echo $this->buildUrl('Index','index',0) ?>">&laquo;</a></li>
    <?php for($i=1;$i<=$page[0];$i++){ ?>
        <li><a href="<?php echo $this->buildUrl($page[1].'/'.$i) ?>"><?php $this->w($i) ?></a></li>
    <?php } ?>
    <li><a href="<?php echo $this->buildUrl('Index','index','') ?>">&raquo;</a></li>
</ul>