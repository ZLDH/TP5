<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/24 0024
 * Time: 下午 5:55
 */
?>
<p></p>
<a href="<?=url('index/user/add')?>">添加用户</a>
<link rel="stylesheet" href="/static/css/bootstrap.css">
<table class="table">
    <tr>
        <th>id</th>
        <th>姓名</th>
<!--        <th>密码</th>-->
        <th>状态</th>
        <th>年龄</th>
        <th>操作</th>
    </tr>
{volist name="users" id="user"}
    <tr>
        <td>{$user.id}</td>
        <td>{$user.name}</td>
<!--        <td>{$user.password}</td>-->
        <td>{$user.status}</td>
        <td>{$user.age}</td>
        <td>
            <a href="<?=url('index/user/edit',['id'=>$user['id']])?>">编辑</a>
            <a href="<?=url('index/user/del',['id'=>$user['id']])?>">删除</a>
        </td>
    </tr>
{/volist}
</table>
{$users->render()}


