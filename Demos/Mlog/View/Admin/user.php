<div class="user-list">
    <h3>用户列表</h3>
    <hr>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>用户ID</th><th>用户名</th><th>邮箱</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($user as $u){ ?>
            <tr>
                <td><?php echo $u['id']?></td>
                <td><?php echo $u['username']?></td>
                <td><?php echo $u['email']?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
