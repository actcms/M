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
                <td><?php $this->w($u['u_id'])?></td>
                <td><?php $this->w($u['username'])?></td>
                <td><?php $this->w($u['email'])?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
