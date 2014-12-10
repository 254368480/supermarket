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
                <dd><a <?php if(($sub_nav == 0)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/viewgoods" url="index.php?act=welcome" parent="dashboard">商品管理</a></dd>
                <dd><a <?php if(($sub_nav == 1)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/addgoods" url="index.php?act=welcome" parent="dashboard">商品添加</a></dd>
            </dl><?php endif; ?>
        <?php if(($nav == 1)): ?><dl id="submenu">
                <dt><a class="ico1" id="submenuTitle" href="javascript:;">人员</a></dt>
                <dd><a <?php if(($sub_nav == 0)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/viewuser" url="index.php?act=welcome" parent="dashboard">人员管理</a></dd>
                <dd><a <?php if(($sub_nav == 1)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/adduser" url="index.php?act=welcome" parent="dashboard">人员添加</a></dd>
            </dl><?php endif; ?>
        <?php if(($nav == 2)): ?><dl id="submenu">
                <dt><a class="ico1" id="submenuTitle" href="javascript:;">收银</a></dt>
                <dd><a <?php if(($sub_nav == 0)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/viewlogs" url="index.php?act=welcome" parent="dashboard">收银记录</a></dd>
            </dl><?php endif; ?>
        <?php if(($nav == 3)): ?><dl id="submenu">
                <dt><a class="ico1" id="submenuTitle" href="javascript:;">门店</a></dt>
                <dd><a <?php if(($sub_nav == 0)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/viewshops" url="index.php?act=welcome" parent="dashboard">门店管理</a></dd>
                <dd><a <?php if(($sub_nav == 1)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/addshops" url="index.php?act=welcome" parent="dashboard">门店添加</a></dd>
            </dl><?php endif; ?>
    </div>
</div>
    <div id="right">
        <table width="1000" style="margin-top: 20px">
            <tr>
                <th>流水号：<?php echo ($log["logs_number"]); ?></th><th>收银员：<?php echo ($log["user_name"]); ?></th><th>门店：<?php echo ($log["user_where"]); ?></th><th>收银时间：<?php echo (date("Y-m-d",$log["time"])); ?></th><th>交易金额：<?php echo ($log["mtotal"]); ?></th><th>交易积分：<?php echo ($log["itotal"]); ?></th><th>实收金额：<?php echo ($log["money"]); ?></th><th>买家：<?php echo ($log["buyer"]); ?></th>
            </tr>
        </table>
        <table class="goods_view_table goods_table" style="width: 100%" border="1" cellpadding="0" cellspacing="0">
            <tr>
                <th>商品编号</th><th>商品名称</th><th>商品金额</th><th>商品积分</th><th>商品数量</th><th>金额小计</th><th>积分小计</th>
            </tr>
            <?php if(is_array($goods)): foreach($goods as $key=>$value): ?><tr>
                <td align="center"><?php echo ($value["goods_number"]); ?></td>
                <td align="center"><?php echo ($value["goods_name"]); ?></td>
                <td align="center"><?php echo ($value["goods_money"]); ?></td>
                <td align="center"><?php echo ($value["goods_int"]); ?></td>
                <td align="center"><?php echo ($value["goods_num"]); ?></td>
                <td align="center"><?php echo ($value['goods_num']*$value['goods_money']); ?></td>
                <td align="center"><?php echo ($value['goods_num']*$value['goods_int']); ?></td>
            </tr><?php endforeach; endif; ?>
        </table>
        <div class="page">
            <?php echo ($page); ?>
        </div>
    </div>
</div>
</body>
</html>