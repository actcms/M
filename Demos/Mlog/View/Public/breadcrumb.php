 <div id="breadcrumb">
    <ol class="breadcrumb">
        <?php foreach($this->data['nav'] as $nav => $url){ ?>
            <li><a href="<?php echo \M\App::buildUrl($url);?>"><?php echo $nav ?></a></li>
        <?php }?>
        <li class="active"><?php echo isset($this->data['title'])?$this->data['title']:'' ; ?></li>
    </ol>
 </div>