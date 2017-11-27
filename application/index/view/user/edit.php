
<br method="post">

    <input type="text" name="name" placeholder="姓名" value="{$user->name}" >
    <p></p>
    <input type="text" name="age" placeholder="年龄" value="{$user->age}">
    <p></p>
<!--    <input type="text" name="password" placeholder="密码" value="{$user->password}">-->
    <input type="radio" name="status" placeholder="状态" value="0" <?php if ($user->status === '删除'){echo 'checked';}?>>删除
    <input type="radio" name="status" placeholder="状态" value="1" <?php if ($user->status === '禁用'){echo 'checked';}?>>禁用
    <input type="radio" name="status" placeholder="状态" value="2" <?php if ($user->status === '正常'){echo 'checked';}?>>正常
    <input type="radio" name="status" placeholder="状态" value="3" <?php if ($user->status === '待审核'){echo 'checked';}?>>待审核
    <p></p>
    <input type="submit" value="提交">

</form>