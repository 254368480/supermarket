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

            $data = array(
                'goods_number' => $goods_number,
                'goods_name' => $goods_name,
                'goods_money' => $goods_money,
                'goods_int' => $goods_int,
                'goods_stock' => $goods_stock
            );
            $Goods = M("Goods");
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
        $count = $Goods->count();
        $Page = new \Think\Page($count,20);
        $show = $Page->show();// 分页显示输出
        $goods = $Goods->order('gid')->limit($Page->firstRow.','.$Page->listRows)->select();
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
                $Goods->where("gid = $gid")->save($data); // 根据条件更新记录
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
            $tel = I('post.tel');

            if(strlen($password) < 6){
                $this->error('密码不能小于6位！');
            }
            $data = array(
                'user_name' => $user_name,
                'password' => md5($password),
                'tel' => $tel,
            );
            $User = M('User');
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
        $users = $User->where('permission = 0')->order('uid')->limit($Page->firstRow.','.$Page->listRows)->select();
        $arr = array(
            'title' => '人员管理_零乐购商超',
            'nav' => '1',
            'sub_nav' => '0',
            'user_name' => session('user_name'),
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
            if($password != '' && strlen($password) < 6 ){
                $this->error('登陆密码不能小于6位！');
            }
            if($User->where("uid = $uid")->count()){
                $data = array(
                    'user_name' => $user_name,
                    'tel' => $tel,
                );
                if(!empty($password)){
                    $data['password'] = md5($password);
                }
                $User->where("uid = $uid")->save($data); // 根据条件更新记录
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

            $data = array(
                'shop_name' => $shop_name,
                'shop_num' => $shop_num
            );
            $Shops = M('Shops');
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

            if($Shops->where("id = $id")->count()){
                $data = array(
                    'shop_name' => $shop_name,
                    'shop_num' => $shop_num,
                );
                $Shops->where("id = $id")->save($data); // 根据条件更新记录
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
        $Logs = M("Cashlogs");
        $count = $Logs->count();
        $Page = new \Think\Page($count,20);
        $show = $Page->show();// 分页显示输出
        $logs = $Logs->order('logs_number asc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $arr = array(
            'title' => '收银记录_零乐购商超',
            'nav' => '2',
            'sub_nav' => '0',
            'user_name' => session('user_name'),
            'logs' => $logs,
            'page' => $show,
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
            $query = $Model->execute("INSERT INTO `supermarket`.`super_goods` (`gid`, `goods_number`, `goods_name`, `goods_money`, `goods_int`, `goods_stock`) values ".$data_values);//批量插入数据表中
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
        $Logsgoods = M('cashlogs_goods');
        $goods = $Logsgoods->order('goods_number asc')->select();
        $this->exportexcel($goods);
    }

    public function login(){
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
                session('isLogin', 1);
                session('uid', $user['uid']);
                session('user_name', $user['user_name']);
                session('tel', $user['tel']);
                session('permission', $user['permission']);
                redirect('/index.php/Home/admin/index', 0, '页面跳转中...');
            }else{
                $this->error('账号或者密码输入错误！');
            }

        }else {
            if(session('?isLogin') && session('isLogin') == 1){
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
        if(!session('?isLogin') || session('isLogin') != 1 || session('permission') != 9){
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
        $Verify->entry();
    }

    //验证码验证
    function _check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }

    function exportexcel($data=array(),$title=array(),$filename='report'){
        header("Content-type:application/octet-stream");
        header("Accept-Ranges:bytes");
        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition:attachment;filename=".$filename.".xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        //导出xls 开始
        if (!empty($title)){
            foreach ($title as $k => $v) {
                $title[$k]=iconv("UTF-8", "GB2312",$v);
            }
            $title= implode("\t", $title);
            echo "$title\n";
        }
        if (!empty($data)){
            foreach($data as $key=>$val){
                foreach ($val as $ck => $cv) {
                    $data[$key][$ck]=iconv("UTF-8", "GB2312", $cv);
                }
                $data[$key]=implode("\t", $data[$key]);

            }
            echo implode("\n",$data);
        }
    }
}