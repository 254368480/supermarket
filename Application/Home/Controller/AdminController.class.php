<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

header("Content-type: text/html; charset=utf-8");
class AdminController extends Controller {
    public function index(){
        $this->_isLogin();
        redirect('/index.php/Home/admin/viewgoods', 0, '页面跳转中...');
    }

    public function addgoods(){
        $this->_isLogin();
        if(IS_POST){
            $goods_number = I('post.goods_number', '');
            $goods_name = I('post.goods_name', '');
            $goods_money = I('post.goods_money', 0, 'intval');
            $goods_int = I('post.goods_int', 0, 'intval');
            $goods_stock = I('post.goods_stock', 0, 'intval');
            $Goods = M("Goods");
            if($Goods->where("goods_number = '$goods_number'")->count())$this->error("商品编号已经存在，添加失败！");
            if($Goods->where("goods_name = '$goods_name'")->count())$this->error("商品名称已经存在，添加失败！");
            $data = array(
                'goods_number' => $goods_number,
                'goods_name' => $goods_name,
                'goods_money' => $goods_money,
                'goods_int' => $goods_int,
                'goods_stock' => $goods_stock
            );
            $Goods->add($data);
            $this->success('添加成功', '/index.php/Home/admin/addgoods');
        }else {
            $arr = array(
                'title' => '添加商品_零乐购商超',
                'nav' => '0',
                'sub_nav' => '1',
                'user_name' => session('user_name'),
            );
            $this->assign($arr);
            $this->display();
        }
    }

    public function viewgoods(){
        $this->_isLogin();
        $Goods = M("Goods");
        $where = '';
        if(IS_POST){
            $goods_number = I('post.goods_number', '');
            if (!empty($goods_number)) {
                $where = "goods_number = $goods_number";
            }
        }
        $count = $Goods->count($where);
        $Page = new \Think\Page($count,20);
        $show = $Page->show();// 分页显示输出
        $goods = $Goods->where($where)->order('goods_number desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $arr = array(
            'title' => '商品管理_零乐购商超',
            'nav' => '0',
            'sub_nav' => '0',
            'user_name' => session('user_name'),
            'goods' => $goods,
            'page' => $show,
        );
        $this->assign($arr);
        $this->display();
    }

    public function editgoods(){
        $this->_isLogin();
        $Goods = M("Goods");
        if(IS_POST){
            $gid = I('post.gid', 0, 'intval');
            $goods_number = I('post.goods_number', '');
            $goods_name = I('post.goods_name', '');
            $goods_money = I('post.goods_money', 0, 'intval');
            $goods_int = I('post.goods_int', 0, 'intval');
            $goods_stock = I('post.goods_stock', 0, 'intval');
            if($Goods->where("gid = $gid")->count()){
                $data = array(
                    'goods_number' => $goods_number,
                    'goods_name' => $goods_name,
                    'goods_money' => $goods_money,
                    'goods_int' => $goods_int,
                    'goods_stock' => $goods_stock
                );
                if(!$Goods->where("gid = $gid")->save($data))$this->error("商品编号或者商品名称已经存在，修改失败！"); // 根据条件更新记录
                $this->success("修改成功！", '/index.php/Home/admin/viewgoods');
            }else{
                $this->error("未定义操作！");
            }
        }elseif(IS_GET){
            $gid = I('get.gid', 0, 'intval');
            $goods = $Goods->where("gid = $gid")->find();
            if(!empty($goods)){
                $arr = array(
                    'title' => '商品编辑_零乐购商超',
                    'nav' => '0',
                    'sub_nav' => '0',
                    'user_name' => session('user_name'),
                    'goods' => $goods,
                );
                $this->assign($arr);
                $this->display();
            }else{
                $this->error("未定义操作！");
            }
        }else{
            $this->error("未定义操作！");
        }
    }

    public function delgoods(){
        $this->_isLogin();
        $Goods = M("Goods");
        if(IS_GET){
            $gid = I('get.gid', 0, 'intval');
            if($Goods->where("gid = $gid")->count()) {
                $Goods->where("gid = $gid")->delete();
                $this->success("删除成功！");
            }else{
                $this->error("未定义操作！");
            }
        }else{
            $this->error("未定义操作！");
        }

    }

    public function adduser(){
        $this->_isLogin();
        if(IS_POST){
            $user_name = I('post.user_name');
            $password = I('post.password');
            $user_where = I('post.user_where');
            $tel = I('post.tel');
            $permission = I('post.permission');

            if(strlen($password) < 6){
                $this->error('密码不能小于6位！');
            }
            $data = array(
                'user_name' => $user_name,
                'password' => md5($password),
                'user_where' => $user_where,
                'permission' => $permission,
                'tel' => $tel,
            );
            $User = M('User');
            if($User->where("user_name = '$user_name'")->count())$this->error("该员工姓名已经存在，添加失败！");
            $User->add($data);
            $this->success("添加成功！");
        }else {
            $arr = array(
                'title' => '添加收银员_零乐购商超',
                'nav' => '1',
                'sub_nav' => '1',
                'user_name' => session('user_name'),
            );
            $this->assign($arr);
            $this->display();
        }
    }

    public function viewuser(){
        $this->_isLogin();
        $User = M("User");
        $count = $User->count();
        $Page = new \Think\Page($count,20);
        $show = $Page->show();// 分页显示输出
        $users = $User->where('permission != 9')->order('uid')->limit($Page->firstRow.','.$Page->listRows)->select();
        $permission = array('否', '是');
        $arr = array(
            'title' => '人员管理_零乐购商超',
            'nav' => '1',
            'sub_nav' => '0',
            'user_name' => session('user_name'),
            'permission' => $permission,
            'users' => $users,
            'page' => $show,
        );
        $this->assign($arr);
        $this->display();
    }

    public function edituser(){
        $this->_isLogin();
        $User = M("User");
        if(IS_POST){
            $uid = I('post.uid', 0, 'intval');
            $user_name = I('post.user_name');
            $password = I('post.password', null);
            $tel = I('post.tel');
            $user_where = I('post.user_where');
            $permission = I('post.permission');
            if($password != '' && strlen($password) < 6 ){
                $this->error('登陆密码不能小于6位！');
            }
            if($User->where("uid = $uid")->count()){
                $data = array(
                    'user_name' => $user_name,
                    'user_where' => $user_where,
                    'tel' => $tel,
                    'permission' => $permission
                );
                if(!empty($password)){
                    $data['password'] = md5($password);
                }
                if(!$User->where("uid = $uid")->save($data))$this->error("员工姓名已经存在，修改失败！"); // 根据条件更新记录
                $this->success("修改成功！", '/index.php/Home/admin/viewuser');
            }else{
                $this->error("未定义操作！");
            }
        }elseif(IS_GET){
            $uid = I('get.uid', 0, 'intval');
            $user = $User->where("uid = $uid")->find();
            if(!empty($user)){
                $arr = array(
                    'title' => '人员编辑_零乐购商超',
                    'nav' => '1',
                    'sub_nav' => '0',
                    'user_name' => session('user_name'),
                    'user' => $user,
                );
                $this->assign($arr);
                $this->display();
            }else{
                $this->error("未定义操作！");
            }
        }else{
            $this->error("未定义操作！");
        }
    }

    public function deluser(){
        $this->_isLogin();
        $User = M("User");
        if(IS_GET){
            $uid = I('get.uid', 0, 'intval');
            if($User->where("uid = $uid")->count()) {
                $User->where("uid = $uid")->delete();
                $this->success("删除成功！");
            }else{
                $this->error("未定义操作！");
            }
        }else{
            $this->error("未定义操作！");
        }
    }

    public function addshops(){
        $this->_isLogin();
        if(IS_POST){
            $shop_name = I('post.shop_name');
            $shop_num = I('post.shop_num');
            $shop_address = I('post.shop_address');
            $shop_user = I('post.shop_user');
            $data = array(
                'shop_name' => $shop_name,
                'shop_num' => $shop_num,
                'shop_address' => $shop_address,
                'shop_user' => $shop_user
            );
            $Shops = M('Shops');
            if($Shops->where("shop_name = '$shop_name'")->count())$this->error("门店名重复，添加失败！");
            if($Shops->where("shop_num = '$shop_num'")->count())$this->error("门店编号重复，添加失败！");
            $Shops->add($data);
            $this->success("添加成功！");
        }else {
            $arr = array(
                'title' => '添加门店_零乐购商超',
                'nav' => '3',
                'sub_nav' => '1',
                'user_name' => session('user_name'),
            );
            $this->assign($arr);
            $this->display();
        }
    }

    public function viewshops(){
        $this->_isLogin();
        $Shops = M("Shops");
        $count = $Shops->count();
        $Page = new \Think\Page($count,20);
        $show = $Page->show();// 分页显示输出
        $shops = $Shops->limit($Page->firstRow.','.$Page->listRows)->select();
        $arr = array(
            'title' => '门店管理_零乐购商超',
            'nav' => '3',
            'sub_nav' => '0',
            'user_name' => session('user_name'),
            'shops' => $shops,
            'page' => $show,
        );
        $this->assign($arr);
        $this->display();
    }

    public function editshops(){
        $this->_isLogin();
        $Shops = M("Shops");
        if(IS_POST){
            $id = I('post.id', 0, 'intval');
            $shop_name = I('post.shop_name');
            $shop_num = I('post.shop_num');
            $shop_address = I('post.shop_address');
            $shop_user = I('post.shop_user');
            if($Shops->where("id = $id")->count()){
                $data = array(
                    'shop_name' => $shop_name,
                    'shop_num' => $shop_num,
                    'shop_address' => $shop_address,
                    'shop_user' => $shop_user
                );
                if(!$Shops->where("id = $id")->save($data))$this->error("门店名称或者编号重复，修改失败！"); // 根据条件更新记录
                $this->success("修改成功！", '/index.php/Home/admin/viewshops');
            }else{
                $this->error("未定义操作！");
            }
        }elseif(IS_GET){
            $id = I('get.sid', 0, 'intval');
            $shop = $Shops->where("id = $id")->find();
            if(!empty($shop)){
                $arr = array(
                    'title' => '人员编辑_零乐购商超',
                    'nav' => '3',
                    'sub_nav' => '0',
                    'user_name' => session('user_name'),
                    'shop' => $shop,
                );
                $this->assign($arr);
                $this->display();
            }else{
                $this->error("未定义操作！");
            }
        }else{
            $this->error("未定义操作！");
        }
    }

    public function delshops(){
        $this->_isLogin();
        $Shops = M("Shops");
        if(IS_GET){
            $id = I('get.sid', 0, 'intval');
            if($Shops->where("id = $id")->count()) {
                $Shops->where("id = $id")->delete();
                $this->success("删除成功！");
            }else{
                $this->error("未定义操作！");
            }
        }else{
            $this->error("未定义操作！");
        }
    }

    public function viewlogs(){
        $this->_isLogin();
        if(IS_POST){
            $user = I('post.user');
            $shop_name = I('post.shop_name');
            $state = I('post.state');
            $start = I('post.start', '', 'strtotime');
            $end = I('post.end', '', 'strtotime');
            if($start > $end)$this->error('起始时间不能大于结束时间，请重新输入！');
            if($start && $end)$end = $end + 60*60*24-1;
            $where = array(
                !empty($user) ? "user_name = '$user'" : "1=1",
                !empty($shop_name) ? "user_where = '$shop_name'" : "1=1",
                $state != '' ? "state = '$state'" : "1=1",
                $start && $end ? "time > $start AND time < $end" : "1=1"
            );

        }else {
            $Y = date('Y', time());
            $m = date('m', time());
            $d = date('d', time());
            $start = mktime(0, 0, 0, $m, $d, $Y);
            $end = mktime(23, 59, 59, $m, $d, $Y);
            $where = " time > $start AND time < $end ";
        }
        $Logs = M("Cashlogs");
        $count = $Logs->where($where)->count();
        $Page = new \Think\Page($count,20);
        $show = $Page->show();// 分页显示输出
        $logs = $Logs->where($where)->order('logs_number asc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $time = date('Y-m-d', time());
        $state = array('现金交易', '刷卡交易', '部分退货', '整单退货');
        $arr = array(
            'title' => '收银记录_零乐购商超',
            'nav' => '2',
            'sub_nav' => '0',
            'user_name' => session('user_name'),
            'time' => $time,
            'logs' => $logs,
            'page' => $show,
            'state' => $state
        );
        $this->assign($arr);
        $this->display();
    }

    public function viewlogsgoods(){
        $this->_isLogin();
        $id = I('get.id', 0, 'intval');
        if($id){
            $Logs = M("Cashlogs");
            $log = $Logs->where("id = $id")->find();
            if(!empty($log)){
                $Logsgoods = M('cashlogs_goods');
                $goods = $Logsgoods->order('goods_number asc')->where("cid = $id")->select();
                $arr = array(
                    'title' => '收银记录_零乐购商超',
                    'nav' => '2',
                    'sub_nav' => '0',
                    'log' => $log,
                    'user_name' => session('user_name'),
                    'goods' => $goods,
                );
                $this->assign($arr);
                $this->display();
            }else{
                $this->error('未定义操作！');
            }
        }else{
            $this->error('未定义操作！');
        }
    }

    public function editlog(){
        if(!session('isLogin') || session('permission') < 1)$this->error("权限不够");
        $logGoods_mod = M('cashlogs_goods');
        $log_mod = M('cashlogs');
        if(IS_GET && I('get.op') == 'backlog'){
            $id = I('get.id');
            $log = $log_mod->where("id = '$id' AND state != 2 AND state != 3")->find();
            if(!$log)$this->error("该交易无法退货！");
            if($log_mod->where("logs_number = 'TH$log[logs_number]'")->count())$this->error("该单已经退过了！");
            $data = array(
                'logs_number' => "TH".$log['logs_number'],
                'user_name' => session('user_name'),
                'user_where' => $log['user_where'],
                'time' => time(),
                'itotal' => "-$log[itotal]",
                'mtotal' => "-$log[mtotal]",
                'money' => 0,
                'buyer' => $log['buyer'],
                'state' => 3,
            );
            $cid = $log_mod->add($data);
            if(!$cid)$this->error("操作失败，请重试！");
            $goods = $logGoods_mod->where("cid = '$id'")->select();
            foreach($goods as $value){
                $data = array(
                    'cid' => $cid,
                    'logs_number' => "TH".$log['logs_number'],
                    'goods_number' => $value['goods_number'],
                    'goods_name' => $value['goods_name'],
                    'goods_money' => $value['goods_money'],
                    'goods_int' => $value['goods_int'],
                    'goods_num' => "-$value[goods_num]",
                    'user_name' => session('user_name'),
                    'user_where' => $value['user_where'],
                    'buyer' => $log['buyer'],
                    'time' => time(),
                );
                $logGoods_mod->add($data);
                //加回库存
                $goods_mod = M('goods');
                $goods_mod->where("goods_number = '$value[goods_number]'")->setInc('goods_stock', $value['goods_num']);
                //
                $goods = $logGoods_mod->where("logs_number = '$log[los_number]")->select();
                $backgoods = $logGoods_mod->where("logs_number = 'TH$log[los_number]'")->select();
                $shop_mod = M('shops');
                $shop_user = $shop_mod->where("shop_name = '$log[user_where]'")->getField('shop_user');
                $hideact = 1;
            }
        }
        if(IS_POST){
            $act = I('post.act');
            if(isset($act) && $act == 'backgoods'){
                $id = I('post.id');
                $num = I('post.num', 0, 'intval');
                if($num <= 0)$this->error('请输入退货数量！');
                $goods = $logGoods_mod->where("id = '$id'")->find();
                if(empty($goods))$this->error("请选择要退的商品！");
                if($goods['goods_num'] < $num)$this->error('退货数量超出售出数量，请重新输入！');
                if($logGoods_mod->where("logs_number = 'TH$goods[logs_number]' AND goods_number = '$goods[goods_number]'")->count())$this->error('该商品已经退过了！');
                $log = $log_mod->where("logs_number = 'TH$goods[logs_number]'")->find();
                if($log){
                    $cid = $log['id'];
                    $money = $num * $goods['goods_money'];
                    $int = $num * $goods['goods_int'];
                    $log_mod->where("logs_number = 'TH$goods[logs_number]'")->setDec('mtotal',$money);
                    $log_mod->where("logs_number = 'TH$goods[logs_number]'")->setDec('itotal',$int);
                }else {
                    $data = array(
                        'logs_number' => "TH".$goods['logs_number'],
                        'user_name' => session('user_name'),
                        'user_where' => $goods['user_where'],
                        'time' => time(),
                        'itotal' => -$goods['goods_int']*$num,
                        'mtotal' => -$goods['goods_money']*$num,
                        'money' => 0,
                        'buyer' => $goods['buyer'],
                        'state' => 2,
                    );
                    $cid = $log_mod->add($data);
                    if (!$cid) $this->error("操作失败，请重试！");
                }
                $data = array(
                    'cid' => $cid,
                    'logs_number' => "TH".$goods['logs_number'],
                    'goods_number' => $goods['goods_number'],
                    'goods_name' => $goods['goods_name'],
                    'goods_money' => $goods['goods_money'],
                    'goods_int' => $goods['goods_int'],
                    'goods_num' => "-$num",
                    'user_name' => session('user_name'),
                    'user_where' => $goods['user_where'],
                    'buyer' => $goods['buyer'],
                    'time' => time(),
                );
                $logGoods_mod->add($data);
                //加回库存
                $goods_mod = M('goods');
                $goods_mod->where("goods_number = '$goods[goods_number]'")->setInc('goods_stock', 1);
            }
            $log_number = I('post.log_number');
            $log_mod = M('cashlogs');
            $log = $log_mod->where("logs_number = '$log_number' AND state !=2 AND state !=3")->find();
            if(empty($log)) $this->error('该收银记录不存在！');
            if($log_mod->where("logs_number = 'TH$log_number' AND state = 3 AND money != 0")->count())$this->error('此单已经全部退货完毕！');
            if($log_mod->where("logs_number = 'TH$log_number' AND state = 2 AND money != 0")->count())$this->error('此单已经退货过了，请不要重复退货！');
            if($log_mod->where("logs_number = 'TH$log_number' AND state = 3")->count())$hideact = 1;
            $goods = $logGoods_mod->where("logs_number = '$log_number'")->select();
            $backgoods = $logGoods_mod->where("logs_number = 'TH$log_number'")->select();
            $shop_mod = M('shops');
            $shop_user = $shop_mod->where("shop_name = '$log[user_where]'")->getField('shop_user');
        }
        $arr = array(
            'title' => '退票_零乐购商超',
            'nav' => '2',
            'sub_nav' => '2',
            'user_name' => session('user_name'),
            'log' => $log,
            'goods' => $goods,
            'backgoods' => $backgoods,
            'shop_user' => $shop_user,
            'hideact' => isset($hideact) ? $hideact : 0,
        );
        $this->assign($arr);
        $this->display();
    }

    public function drgoods(){
        $this->_isLogin();
        if(IS_POST){
            $filename = $_FILES['file']['tmp_name'];
            if (empty ($filename)) {
                $this->error("请选择要导入的文件");
            }
            $handle = fopen($filename, 'r');
            $result = $this->input_csv($handle); //解析csv
            $len_result = count($result);
            if($len_result==0){
                $this->error("没有数据！");
            }
            $data_values = '';
            for ($i = 1; $i < $len_result; $i++) { //循环获取各字段值
                $goods_number = iconv('gb2312', 'utf-8', $result[$i][0]); //中文转码
                $goods_name = iconv('gb2312', 'utf-8', $result[$i][1]);
                $goods_money = $result[$i][2];
                $goods_int = $result[$i][3];
                $goods_stock = $result[$i][4];
                $data_values .= "('NULL','$goods_number','$goods_name','$goods_money','$goods_int','$goods_stock'),";
            }
            $data_values = substr($data_values,0,-1); //去掉最后一个逗号
            fclose($handle); //关闭指针
            $Model = new Model();
            $query = $Model->execute("INSERT INTO `super_goods` (`gid`, `goods_number`, `goods_name`, `goods_money`, `goods_int`, `goods_stock`) values ".$data_values);//批量插入数据表中
            if($query){
                echo '导入成功！';
            }else{
                echo '导入失败！';
            }
        }else{
            $arr = array(
                'title' => '导入商品_零乐购商超',
                'nav' => '0',
                'sub_nav' => '2',
                'user_name' => session('user_name'),
            );
            $this->assign($arr);
            $this->display();
        }
    }

    public function download(){
        $this->_isLogin();
        if(IS_POST) {
            $start = strtotime(I('post.start'));
            $end = strtotime(I('post.end'));
            if(empty($start))$this->error('请输入起始时间！');
            if(empty($start))$this->error('请输入结束时间！');
            if($start > $end)$this->error('起始时间不能大于结束时间！');
            if($start == $end){
                $Y = date('Y', $start);
                $m = date('m', $start);
                $d = date('d', $start);
                $end = mktime(23,59,59,$m,$d,$Y);
            }else{
                if($start > $end)$this->error('起始时间不能大于结束时间！');
            }
            $where = "time > $start AND time < $end";
            $Logsgoods = M('cashlogs_goods');
            $goods = $Logsgoods->where($where)->order('goods_number asc')->select();
            foreach($goods as $key => $value){
                $goods[$key]['time'] = date('Y-m-d H:i', $value['time']);
            }
            $title = array('商品ID', '小票ID', '小票流水号', '商品编号', '商品名称', '商品单价', '商品积分', '商品数量', '收银员', '交易门店', '买家', '时间');
            $this->exportexcel($goods, $title);
        }else{
            $arr = array(
                'title' => '导入商品_零乐购商超',
                'nav' => '2',
                'sub_nav' => '1',
                'user_name' => session('user_name'),
            );
            $this->assign($arr);
            $this->display();
        }
    }

    public function backend(){
        if(!session('isLogin') || session('permission') < 1)$this->error('权限不够');
        $money = -I('post.money', 0);
        $logs_number = I('post.logs_number');

        $log_mod = M('cashlogs');
        if($log_mod->where("logs_number = 'TH$logs_number'")->setField('money',$money))$this->success('操作成功！');
        else $this->error('操作失败！');
    }

    public function checkpass(){
        if(!session('isLogin') || session('permission') < 1){
            echo 0;
            exit;
        }
        $pass = MD5(I('post.password'));
        $user_mod = M('user');
        $user_name = session('user_name');
        $password = $user_mod->where("user_name = '$user_name'")->getField('password');
        if($pass == $password){
            echo 1;
            exit;
        }else{
            echo 0;
            exit;
        }
        exit;
    }

    public function login(){
        if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE"))$this->error("不支持IE浏览器，请使用火狐，谷歌等浏览器");
        if(!empty($_POST['dosubmit'])){
            $name = $this->_checkinput($_POST['user_name']);
            $pass = md5($this->_checkinput($_POST['password']));
            $captcha = $this->_checkinput($_POST['captcha']);

            if(!$this->_check_verify($captcha)){
                $this->error('验证码输入错误！');
            }
            $User = M("User");
            $user = $User->where(array('user_name' => $name, 'password' => $pass, 'permission' => 9))->find();
            if(!empty($user)){
                session('isLogin', 2);
                session('uid', $user['uid']);
                session('user_name', $user['user_name']);
                session('tel', $user['tel']);
                session('permission', $user['permission']);
                redirect('/index.php/Home/admin/index', 0, '页面跳转中...');
            }else{
                $this->error('账号或者密码输入错误！');
            }

        }else {
            if(session('?isLogin') && session('isLogin') == 2){
                redirect('/index.php/Home/admin/index', 0, '页面跳转中...');
            }else {
                $this->assign('title', '登陆_零乐购商超');
                $this->display();
            }
        }
    }

    function input_csv($handle) {
        $out = array ();
        $n = 0;
        while ($data = fgetcsv($handle, 10000)) {
            $num = count($data);
            for ($i = 0; $i < $num; $i++) {
                $out[$n][$i] = $data[$i];
            }
            $n++;
        }
        return $out;
    }

    function logout(){
        session(null); // 清空当前的session
        //删除cookie中的session id
        if(isset($_COOKIE[session_name()])) {
            cookie(session_name(), null);
        }
        session('[destroy]'); // 销毁session
        $this->success('退出成功！', '/index.php/home/admin/login');
    }

    function _isLogin(){
        if(!session('?isLogin') || session('isLogin') != 2 || session('permission') != 9){
            $this->error('请先登录', '/index.php/home/admin/login', 1);
        }
        return true;
    }

    //过滤表单输入内容
    function _checkinput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //验证码
    function verifycode(){
        $config = array(
            'fontSize' => 14, // 验证码字体大小
            'length' => 4, // 验证码位数
            'useNoise' => false, // 关闭验证码杂点
            'imageW' => 110,
            'imageH' => 30,
            'fontttf'  => '5.ttf'
        );
        $Verify = new \Think\Verify($config);
        ob_clean();
        $Verify->entry();
    }

    //验证码验证
    function _check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }

    function exportexcel($data=array(),$title=array(),$filename='report'){
        header("Content-type: text/html; charset=uft-8");
        header("Content-type:application/octet-stream");
        header("Accept-Ranges:bytes");
        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition:attachment;filename=".$filename.".xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        //导出xls 开始
        if (!empty($title)){
            foreach ($title as $k => $v) {
                $title[$k]=iconv("UTF-8", "UTF-8",$v);
            }
            $title= implode("\t", $title);
            echo "$title\n";
        }
        if (!empty($data)){
            foreach($data as $key=>$val){
                foreach ($val as $ck => $cv) {
                    $data[$key][$ck]=iconv("UTF-8", "UTF-8", $cv);
                }
                $data[$key]=implode("\t", $data[$key]);

            }
            echo implode("\n",$data);
        }
    }
}