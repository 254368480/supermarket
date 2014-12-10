<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" href="/public/admin/css/style.css">
</head>

<body class="login_body">
    <div id="enter">
        <h1>零乐购商超管理中心</h1>
        <table>
            <form method="post" action="/index.php/home/admin/login">
            <tbody>
                <tr>
                    <td>用户名:</td>
                    <td colspan="3"><input class="text" id="user_name" name="user_name" type="text"></td>
                </tr>
                <tr>
                    <td>密&nbsp;&nbsp;&nbsp;码:</td>
                    <td class="width160"><input class="text" name="password" type="password"></td>
                    <td>验证码:</td>
                    <td><input class="text2" name="captcha" type="text"> <div class="validates"><img onclick="this.src='/index.php/home/admin/verifycode?'+ Math.round(Math.random()*10000)" src='/index.php/home/admin/verifycode'></div></td>
                </tr>
                <tr>
                    <th colspan="4">
                        <input class="btnEnter" name="dosubmit" value="提交" type="submit">
                    </th>
                </tr>
            </tbody>
            </form>
        </table>
    </div>
</body>
</html>