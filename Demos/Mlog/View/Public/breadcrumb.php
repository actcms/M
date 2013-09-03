 <div id="breadcrumb">
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <?php foreach($this->data['nav'] as $nav){ ?>
            <li><a href="#"><?php echo $nav ?></a></li>
        <?php }?>
        <li class="active"><?php echo isset($this->data['title'])?$this->data['title']:'' ; ?></li>
    </ol>
 </div>