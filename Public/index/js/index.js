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

});
function payint(obj){
    $('span.buyer').siblings('input.formbtn').hide();
    var buyer = $('span.buyer').find('input').val();
    $('span.buyer').html('<input type="hidden" name="buyer" value="'+buyer+'"><input type="hidden" name="buyer" value="'+buyer+'" form="cash_form">'+buyer);
}