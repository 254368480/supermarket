$(document).ready(function(){

    $("#inputmoney").blur(function(){
        var money = $('#money').find("input").val();
        var ymoney = $('#ymoney').find("input").val();
        if(money == ''){
            alert("请输入实收金额！");
            return false;
        }
        if(money - ymoney < 0){
            alert("实收金额小于应收金额，请重新输入！");
            return false;
        }
        $('#money').html(money+"<input type='hidden' form='cash_form' name='money' value='"+money+"'>");
        var zmoney = money - ymoney;
        $('#zmoney').html(zmoney+"<input type='hidden' form='cash_form' name='zmoney' value='"+zmoney+"'>");
        var money = $('#money').text();
        $.post("/index.php/Home/index/editmoney", {money: money});
    });

    $('td.goods_num').find('input').blur(function() {
        var num = $(this).val();
        var goods_number = $(this).parent().siblings('input.goods_number').val();
        $.post("/index.php/Home/index/editnum", {num: num,number: goods_number}, function(){
            window.location.href="/index.php/Home/index/index";
        });
    });

    $('#sure').click(function(){
        var money = $('#money').text();
        $.post("/index.php/Home/index/editmoney", {money: money});
    });

});
function payint(){
    var touser = $("input[tw=touser]").val();
    var itotal = $("input[tw=itotal]").val();
    var buyer = $("input[tw=buyer]").val();
    var pw = $("input[tw=pw]").val();
    checkre(buyer, '支付用户为空！');
    checkre(pw, '密码为空！');

    $.post('/index.php/Home/index/payint', {
        touser:touser,
        itotal:itotal,
        buyer:buyer,
        pw:pw
    }, function(data,status){
        $("input[tw=result]").val(data);
        if(data == '支付成功！') {
            $("button[tw=btn]").attr("disabled", true);
        }
    });
}

function checkre(val, ms){
    if(val == ''){
        alert(ms);
        return false;
    }
}

function check(){
    var ymoney = $('input[tw=ymoney]').val();
    var money = $('input[tw=money]').val();
    var result = $('input[tw=result]').val();
    if(money < ymoney){
        alert('支付金额不足！');
        return false;
    }
    if(result != '支付成功！'){
        alert('积分尚未支付成功！');
        return false;
    }
    return true;
}



