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
            var number = document.form.goods_number;
            var name = document.form.goods_name;
            var money = document.form.goods_money;
            var int = document.form.goods_int;
            var stock = document.form.goods_stock;

            if(!checkinput(number, 'req', '请输入商品编号！')){
                return false;
            }
            if(!checkinput(name, 'req', '请输入商品名称！')){
                return false;
            }
            if(!checkinput(money, 'req', '请输入商品价格！')){
                return false;
            }
            if(!checkinput(money, 'int', '商品价格必须为数字！')){
                return false;
            }
            if(!checkinput(int, 'req', '请输入商品积分！')){
                return false;
            }
            if(!checkinput(int, 'int', '商品积分必须为数字！')){
                return false;
            }
            if(!checkinput(stock, 'req', '请输入商品库存！')){
                return false;
            }
            if(!checkinput(stock, 'int', '商品库存必须为数字！')){
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
            </dl><?php endif; ?>
        <?php if(($nav == 3)): ?><dl id="submenu">
                <dt><a class="ico1" id="submenuTitle" href="javascript:;">门店</a></dt>
                <dd><a <?php if(($sub_nav == 0)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/viewshops" >门店管理</a></dd>
                <dd><a <?php if(($sub_nav == 1)): ?>class="selected"<?php endif; ?> href="/index.php/Home/admin/addshops" >门店添加</a></dd>
            </dl><?php endif; ?>
    </div>
</div>
    <div id="right">
        <form name="form" method="post" action="/index.php/Home/admin/addgoods" onsubmit="return checkform()">
        <table class="goods_table">
            <tr><td>商品编号：</td><td><input type="text" name="goods_number" id="goods_number" required="required"></td></tr>
            <tr><td>商品名称：</td><td><input type="text" name="goods_name" id="goods_name" required="required"></td></tr>
            <tr><td>商品价格：</td><td><input type="text" name="goods_money" id="goods_money" required="required"></td></tr>
            <tr><td>商品积分：</td><td><input type="text" name="goods_int" id="goods_int" required="required"></td></tr>
            <tr><td>商品库存：</td><td><input type="text" name="goods_stock" id="goods_stock" required="required"></td></tr>
            <tr><td colspan="2"><input style="margin-left: 50px;margin-right: 10px;margin-top: 10px;" class="formbtn" type="submit" name="dosubmit" value="提交"><input class="formbtn" type="reset" value="重置"></td></tr>
        </table>
        </form>
    </div>
</div>
</body>
</html>