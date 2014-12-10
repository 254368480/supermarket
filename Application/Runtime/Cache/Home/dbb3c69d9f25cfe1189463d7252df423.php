<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" href="/public/admin/css/style.css">
    <script src="/public/admin/js/jquery.js"></script>
    <script src="/public/admin/js/admin.js"></script>
    <script>
        function checkform(){
            var name = document.form.shop_name;
            var num = document.form.shop_num;
            if(!checkinput(name, 'req', '请输入门店名称！')){
                return false;
            }
            if(!checkinput(num, 'req', '请输入门店编号！')){
                return false;
            }
        }
    </script>
</head>

<body class="admin_body">
<div id="head">
    <div id="logo"><a href="/index.php"><img src="templates/style/images/logo.gif" alt="LOGO"></a></div>
    <div id="menu"><span>您好，<strong><?php echo ($user_name); ?></strong> <a href="/index.php/Home/admin/logout">[退出]</a></span></div>
    <ul id="nav">
        <li><a <?php if(($nav == 0)): ?>class="link actived"<?php else: ?>class="link"<?php endif; ?> href="/index.php/Home/admin/viewgoods">商品</a></li>
        <li><a <?php if(($nav == 1)): ?>class="link actived"<?php else: ?>class="link"<?php endif; ?> href="/index.php/Home/admin/viewuser">人员</a></li>
        <li><a <?php if(($nav == 2)): ?>class="link actived"<?php else: ?>class="link"<?php endif; ?> href="javascript:;">收银</a></li>
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
        <?php if(($nav == 3)): ?><dl id="submenu">
                <dt><a class="ico1" id="submenuTitle" href="javascript:;">门店</a></dt>
                <dd><a <?php if(($sub_nav == 0)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/viewshops" url="index.php?act=welcome" parent="dashboard">门店管理</a></dd>
                <dd><a <?php if(($sub_nav == 1)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/addshops" url="index.php?act=welcome" parent="dashboard">门店添加</a></dd>
            </dl><?php endif; ?>
    </div>
</div>
    <div id="right">
        <form name="form" method="post" action="/index.php/Home/admin/editshops" onsubmit="return checkform()">
        <table class="goods_table">
            <input type="hidden" name="id" value="<?php echo ($shop["id"]); ?>">
            <tr><td>门店编号：</td><td><input type="text" name="shop_num" value="<?php echo ($shop["shop_num"]); ?>" required="required"></td></tr>
            <tr><td>门店名称：</td><td><input type="text" name="shop_name" value="<?php echo ($shop["shop_name"]); ?>" required="required"></td></tr>
            <tr><td colspan="2"><input style="margin-left: 50px;margin-right: 10px;margin-top: 10px;" class="formbtn" type="submit" name="dosubmit" value="提交"><input class="formbtn" type="reset" value="重置"></td></tr>
        </table>
        </form>
    </div>
</div>
</body>
</html>