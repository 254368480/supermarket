<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" href="/public/index/css/style.css">
    <script src="/public/admin/js/jquery.js"></script>
    <script src="/public/index/js/index.js"></script>
</head>

<body class="cash_body">
    <div class="center">
        <div class="cash_head">
            <form class="cashform" action="/index.php/Home/index/index" method="post">
            商品编号：<input type="text" name="goods_number" autofocus="autofocus"><input class="formbtn" type="submit" value="提交">
            </form>
            <div style="float:right;margin-right: 50px;font-size: 14px"><a style="color:#fff" href="/index.php/Home/index/index/act/re">放弃本次交易</a> | <a style="color: #FFFFFF" href="/index.php/Home/index/logout">退出</a></div>
            <div style="float:right;margin-right: 50px;font-size: 14px">收银员：<?php echo ($user_name); ?></div>
            <div style="float:right;margin-right: 50px;font-size: 14px">门店：<?php echo ($user_where); ?></div>

        </div>
        <div class="clear"></div>
        <form method="post" action="/index.php/Home/index/jiesuan" id="cash_form">
            <table width="1000px" border="1" cellspacing="0" cellpadding="0">
                <tr>
                    <th width="400px">商品名称</th><th>商品价格</th><th>商品积分</th><th width="80px">商品数量</th><th>金额小计</th><th>积分小计</th>
                </tr>
                <?php if(is_array($goods)): foreach($goods as $key=>$value): ?><tr>
                    <input class="goods_number" type="hidden" name="goods_number[]" value="<?php echo ($value["goods_number"]); ?>">
                    <input type="hidden" name="goods_name[]" value="<?php echo ($value["goods_name"]); ?>">
                    <input type="hidden" name="goods_money[]" value="<?php echo ($value["goods_money"]); ?>">
                    <input type="hidden" name="goods_int[]" value="<?php echo ($value["goods_int"]); ?>">
                    <input type="hidden" name="mcount[]" value="<?php echo ($value["mcount"]); ?>">
                    <input type="hidden" name="icount[]" value="<?php echo ($value["icount"]); ?>">
                    <td align="center"><?php echo ($value["goods_name"]); ?></td>
                    <td align="center" class="goods_money"><?php echo ($value["goods_money"]); ?></td>
                    <td align="center" class="goods_int"><?php echo ($value["goods_int"]); ?></td>
                    <td align="center" class="goods_num"><input style="width: 30px;background-color: #000;border: none;color:#fff;text-align: center" type="text" name="goods_num[]" value="<?php echo ($value["goods_num"]); ?>" required="required"></td>
                    <td align="center" class="mcount"><?php echo ($value["mcount"]); ?></td>
                    <td align="center" class="icount"><?php echo ($value["icount"]); ?></td>
                </tr><?php endforeach; endif; ?>
            </table>
        </form>
        <div class="total">
            所需积分：<input type="hidden" class="itotal" name="itotal" value="<?php echo ($itotal); ?>" form="cash_form"><span class="itotal"><?php echo ($itotal); ?></span><br>
            应收金额：<span id="ymoney"><input type="hidden" name="mtotal" value="<?php echo ($mtotal); ?>" form="cash_form"><?php echo ($mtotal); ?></span><br>
            实收金额：<span id="money"><input autocomplete="off" type="text" style="width:40px" name="money" required="required"></span><button id="sure">确定</button><br>
            找    零：<span id="zmoney"></span><br>
        </div>
        <div class="clear"></div>
        <form method="post" action="/index.php/Home/index/payint" target="_blank">
            用户名：<span class="buyer"><input type="text" name="buyer" required="required"></span>
            <input type="hidden" name="itotal" value="<?php echo ($itotal); ?>">
            <input type="submit" class="formbtn" value="支付积分" onclick="payint(this)">
        </form>
        <input type="submit" style="margin-top: 10px" class="formbtn" value="打印小票" form="cash_form">
    </div>
</body>
</html>