<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" href="/public/admin/css/style.css">
</head>

<body class="admin_body">
    <div id="head">
    <div id="logo"><a href="/index.php"><img src="templates/style/images/logo.gif" alt="LOGO"></a></div>
    <div id="menu"><span>您好，<strong><?php echo ($user_name); ?></strong> <a href="/index.php/Home/admin/logout">[退出]</a></span></div>
    <ul id="nav">
        <li><a <?php if(($nav == 0)): ?>class="link actived"<?php else: ?>class="link"<?php endif; ?> href="javascript:;">商品</a></li>
        <li><a <?php if(($nav == 1)): ?>class="link actived"<?php else: ?>class="link"<?php endif; ?> href="javascript:;">人员</a></li>
        <li><a <?php if(($nav == 2)): ?>class="link actived"<?php else: ?>class="link"<?php endif; ?> href="javascript:;">收银</a></li>
    </ul>
    <div id="headBg"></div>
</div>
    <div class="content">
        <div id="left">
    <div id="leftMenus">
        <dl id="submenu">
            <dt><a class="ico1" id="submenuTitle" href="javascript:;">商品</a></dt>
            <dd><a <?php if(($sub_nav == 0)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/viewgoods" url="index.php?act=welcome" parent="dashboard">商品管理</a></dd>
            <dd><a <?php if(($sub_nav == 1)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/addgoods" url="index.php?act=welcome" parent="dashboard">商品添加</a></dd>
        </dl>
    </div>
</div>
    </div>
</body>
</html>