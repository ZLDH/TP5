
<form method="post" enctype="multipart/form-data">

    <input type="text" name="name" placeholder="姓名">
    <p></p>
    <input type="text" name="age" placeholder="年龄">
    <p></p>
    <input type="text" name="password" placeholder="密码">
    <p></p>
    <input type="file" name="logo">
    <p></p>
    <input type="radio" name="status" placeholder="状态" value="0">删除
    <input type="radio" name="status" placeholder="状态" value="1">禁用
    <input type="radio" name="status" placeholder="状态" value="2">正常
    <input type="radio" name="status" placeholder="状态" value="3">待审核
    <p></p>
    <input type="text" name="captcha" placeholder="验证码">
    <p></p>
    <div>{:captcha_img()}</div>
    <p></p>
    <input type="submit" class="btn btn-primary" value="提交">

</form>