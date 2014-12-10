<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" href="/public/index/css/style.css">
</head>

<body>
    <div class="print_body">
        <table width="200" style="margin-top: 30px">
            <tr><td>门店：<?php echo ($log["user_where"]); ?></td><td>收银员：<?php echo ($user_name); ?></td></tr>
            <tr><td colspan="2">日期：<?php echo (date("Y-m-d H:i:s",$log["time"])); ?></td></tr>
            <tr><td colspan="2">票号：<?php echo ($log["logs_number"]); ?></td></tr>
        </table>
        <div>==================================</div>
        <table width="300">
            <tr><th>品名</th><th>数量</th><th>单价</th><th>积分</th><th>金额小计</th><th>积分小计</th></tr>
            <?php if(is_array($goods)): foreach($goods as $key=>$value): ?><tr>
                <td><?php echo ($value["goods_name"]); ?></td>
                <td><?php echo ($value["goods_num"]); ?></td>
                <td><?php echo ($value["goods_money"]); ?></td>
                <td><?php echo ($value["goods_int"]); ?></td>
                <td><?php echo ($value['goods_num'] * $value['goods_money']); ?></td>
                <td><?php echo ($value['goods_num'] * $value['goods_int']); ?></td>
            </tr><?php endforeach; endif; ?>
        </table>
        <div>-----------------------------------------------------------</div>
        <table width="200">
            <tr><td>应付：<?php echo ($log["mtotal"]); ?></td><td>实收：<?php echo ($log["money"]); ?></td></tr>
            <tr><td>找零：<?php echo ($log['money'] - $log['mtotal']); ?></td><td>总积分：<?php echo ($log["itotal"]); ?></td></tr>
        </table>
        <div>==================================</div>
    </div>
</body>
</html>