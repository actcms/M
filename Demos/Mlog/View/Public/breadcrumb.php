 <div id="breadcrumb">
    <ol class="breadcrumb">
        <?php foreach($this->data['nav'] as $nav => $url){ ?>
            <li><a href="<?php echo $this->buildUrl($url)?>"><?php $this->w($nav)?></a></li>
        <?php }?>
        <li class="active"><?php $this->w(isset($this->data['title'])?$this->data['title']:'')?></li>
    </ol>
 </div>
