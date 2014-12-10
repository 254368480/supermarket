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
            <form method="post" action="http://www.linglegou.com/index.php?app=member&act=payint">
            <tbody>
                <input type="hidden" name="touser" value="<?php echo ($touser); ?>">
                <tr><td>支付积分:</td><td><input name="itotal" type="hidden" value="<?php echo ($itotal); ?>"><?php echo ($itotal); ?></td></tr>
                <tr><td>用   户   名:</td><td><input name="user_name" type="hidden" value="<?php echo ($buyer); ?>" required="required"><?php echo ($buyer); ?></td></tr>
                <tr><td>密  &nbsp;&nbsp;&nbsp;  码:</td><td><input class="text" name="password" type="password" required="required"></td></tr>
                <tr><td colspan="2" align="center"><input class="formbtn" name="dosubmit" value="确认支付" type="submit" style="margin-right: 10px"></td></tr>
            </tbody>
            </form>
        </table>
    </div>
</body>
</html>