<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" href="/public/index/css/style.css">
</head>

<body class="login_body">
    <div id="enter">
        <h1>零乐购商超</h1>
        <table>
            <form method="post" action="/index.php/home/index/login">
            <tbody>
                <tr><td>用户名:</td><td><input class="text" id="user_name" name="user_name" type="text" required="required"></td></tr>
                <tr><td>密&nbsp;&nbsp;&nbsp;码:</td><td><input class="text" name="password" type="password" required="required"></td></tr>
                <tr><td>门&nbsp;&nbsp;&nbsp;店：</td>
                    <td>
                        <select name="user_where">
                                    <option value="0">请选择</option>
                                <?php if(is_array($shops)): foreach($shops as $key=>$value): ?><option value="<?php echo ($value["shop_name"]); ?>"><?php echo ($value["shop_name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </td>
                </tr>
                <tr><td>验证码:</td><td><input class="text2" name="captcha" type="text" required="required"></td></tr>
                <tr><td></td><td><img onclick="this.src='/index.php/home/index/verifycode?'+ Math.round(Math.random()*10000)" src='/index.php/home/index/verifycode'></td></tr>
                <tr><th></th><td><input class="btnEnter" name="dosubmit" value="提交" type="submit" style="margin-right: 10px"><input class="btnEnter" name="reset" value="重置" type="reset"></td></tr>
            </tbody>
            </form>
        </table>
    </div>
</body>
</html>