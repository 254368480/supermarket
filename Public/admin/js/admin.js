

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