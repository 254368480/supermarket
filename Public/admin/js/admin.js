$(document).ready(function(){
    $('#close').click(function(){
        $('#paybox').hide();
    });
    $('#sure').click(function(){
        var password = $('#password').val();
        $.post("/index.php/Home/admin/checkpass", {password:password}, function(data){
            if(data == 1)$('#paybox').show();
            else alert('密码错误！');
        });
    });
});



function checkinput(obj, type, msg){
    if(type == 'req') {
        if (obj.value == '') {
            alert(msg);
            obj.focus();
            return false;
        }
    }
    if(type == 'int'){
        if(isNaN(obj.value)){
            alert(msg);
            obj.focus();
            return false;
        }
    }
    return true;
}