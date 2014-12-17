$(document).ready(function(){
    $("#sure").click(function(){
        var money = $('#money').find("input").val();
        var ymoney = $('#ymoney').find("input").val();

        if(money - ymoney < 0){
            alert("实收金额小于应收金额，请重新输入！");
            return false;
        }
        $('#money').html(money+"<input type='hidden' form='cash_form' name='money' value='"+money+"'>");
        $(this).hide();
        var zmoney = money - ymoney;
        $('#zmoney').html(zmoney+"<input type='hidden' form='cash_form' name='zmoney' value='"+zmoney+"'>");
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
    var user_name = $('#buyer').val();
    var password = $('#password').val();
    var int = $('input.itotal').val();
    var to_user = $('#to_user').val();
    $.post("http://www.linglegou.com/index.php?act=payint", {user_name: user_name, int:int, to_user:to_user, password:password}, function(){
        alert();
    });
}
