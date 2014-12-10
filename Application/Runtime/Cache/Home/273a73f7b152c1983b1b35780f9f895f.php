<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" href="/public/admin/css/style.css">
    <script src="/public/admin/js/jquery.js"></script>
    <script src="/public/admin/js/admin.js"></script>
</head>

<body class="admin_body">
<div id="head">
    <div id="logo"><a href="/index.php"><img src="templates/style/images/logo.gif" alt="LOGO"></a></div>
    <div id="menu"><span>您好，<strong><?php echo ($user_name); ?></strong> <a href="/index.php/Home/admin/logout">[退出]</a></span></div>
    <ul id="nav">
        <li><a <?php if(($nav == 0)): ?>class="link actived"<?php else: ?>class="link"<?php endif; ?> href="/index.php/Home/admin/viewgoods">商品</a></li>
        <li><a <?php if(($nav == 1)): ?>class="link actived"<?php else: ?>class="link"<?php endif; ?> href="/index.php/Home/admin/viewuser">人员</a></li>
        <li><a <?php if(($nav == 2)): ?>class="link actived"<?php else: ?>class="link"<?php endif; ?> href="/index.php/Home/admin/viewlogs">收银</a></li>
        <li><a <?php if(($nav == 3)): ?>class="link actived"<?php else: ?>class="link"<?php endif; ?> href="/index.php/Home/admin/viewshops">门店</a></li>
    </ul>
    <div id="headBg"></div>
</div>
<div class="content">
    <div id="left">
    <div id="leftMenus">
        <?php if(($nav == 0)): ?><dl id="submenu">
                <dt><a class="ico1" id="submenuTitle" href="javascript:;">商品</a></dt>
                <dd><a <?php if(($sub_nav == 0)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/viewgoods" >商品管理</a></dd>
                <dd><a <?php if(($sub_nav == 1)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/addgoods" >商品添加</a></dd>
                <dd><a <?php if(($sub_nav == 2)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/drgoods" >导入商品</a></dd>
            </dl><?php endif; ?>
        <?php if(($nav == 1)): ?><dl id="submenu">
                <dt><a class="ico1" id="submenuTitle" href="javascript:;">人员</a></dt>
                <dd><a <?php if(($sub_nav == 0)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/viewuser" >人员管理</a></dd>
                <dd><a <?php if(($sub_nav == 1)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/adduser" >人员添加</a></dd>
            </dl><?php endif; ?>
        <?php if(($nav == 2)): ?><dl id="submenu">
                <dt><a class="ico1" id="submenuTitle" href="javascript:;">收银</a></dt>
                <dd><a <?php if(($sub_nav == 0)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/viewlogs" >收银记录</a></dd>
                <dd><a <?php if(($sub_nav == 1)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/download" >导出记录</a></dd>
            </dl><?php endif; ?>
        <?php if(($nav == 3)): ?><dl id="submenu">
                <dt><a class="ico1" id="submenuTitle" href="javascript:;">门店</a></dt>
                <dd><a <?php if(($sub_nav == 0)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/viewshops" >门店管理</a></dd>
                <dd><a <?php if(($sub_nav == 1)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/addshops" >门店添加</a></dd>
            </dl><?php endif; ?>
    </div>
</div>
    <div id="right">
        <table class="goods_view_table goods_table" style="width: 100%" border="1" cellpadding="0" cellspacing="0">
            <tr>
                <th>商品编号</th><th>商品名称</th><th>商品价格</th><th>商品积分</th><th>商品库存</th><th>操作</th>
            </tr>
            <?php if(is_array($goods)): foreach($goods as $key=>$value): ?><tr>
                <td align="center"><?php echo ($value["goods_number"]); ?></td>
                <td align="center"><?php echo ($value["goods_name"]); ?></td>
                <td align="center"><?php echo ($value["goods_money"]); ?></td>
                <td align="center"><?php echo ($value["goods_int"]); ?></td>
                <td align="center"><?php echo ($value["goods_stock"]); ?></td>
                <td align="center"><a href="/index.php/Home/Admin/editgoods/gid/<?php echo ($value["gid"]); ?>">编辑</a> | <a href="/index.php/Home/Admin/delgoods/gid/<?php echo ($value["gid"]); ?>">删除</a></td>
            </tr><?php endforeach; endif; ?>
        </table>
        <div class="page">
            <?php echo ($page); ?>
        </div>
    </div>
</div>
</body>
</html>