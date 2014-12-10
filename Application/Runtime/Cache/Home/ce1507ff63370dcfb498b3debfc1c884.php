<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>系统消息</title>
    <link rel="stylesheet" href="/public/admin/css/style.css">
</head>

<body>
    <div class="message">
        <h1>零乐购商超系统消息</h1>
        <dl>
            <dt><?php echo ($message); ?></dt>
            <dd><a href="javascript:history.back()" class="forward">返回上一页</a></dd>
        </dl>
    </div>
</body>
</html>