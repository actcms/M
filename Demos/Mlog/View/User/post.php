<div class="post">
    <table class="table">
        <thead>
            <th>文章ID</th><th>标题</th><th>发布日期</th><th>管理</th>
        </thead>
        <?php foreach($post as $p){ ?>
        <tr>
            <td><?php echo $p['id']?></td>
            <td><?php echo $p['title']?></td>
            <td><?php echo date('Y-m-d h:m:s',$p['create_time'])?></td>
            <td>
                <a href="<?php echo \M\App::buildUrl('Post','update',$p['id'])?>"><span class="glyphicon glyphicon-edit" title="编辑"></span></a>&nbsp|
                <a href="<?php echo \M\App::buildUrl('Post','delete',$p['id'])?>)"><span class="glyphicon glyphicon-trash" title="删除"></a></span>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
<div id="pageNav">
    <?php include_once APP.'/View/Public/pageNav.php'?>
</div>