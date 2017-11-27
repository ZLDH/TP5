<?php

namespace app\Index\controller;

use app\index\model\User;
use think\auth\Auth;
use think\Db;
use think\Request;

class UserController extends BaseController
{
    public function index()
    {
        $controller = request()->controller();
        $action = request()->action();
//        var_dump($controller."-".$action);exit;


        $users = User::paginate(3);
        return $this->fetch('index', ['users' => $users]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function add()
    {
//判定是不是post提交
        if (request()->isPost()) {
            $data = request()->post();
//            $result = $this->validate($data,[
//                'captcha|验证码'=>'require|captcha',
//            ]);
//            var_dump($result);exit;
            if (captcha_check($data['captcha']) === false) {
                return $this->error("验证码错误");
            }
            $file = request()->file('logo');
            // 移动到框架应用根目录/public/uploads/ 目录下
            if ($file) {
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                if ($info) {
                    // 成功上传后 获取上传信息
                    $data['logo'] = $info->getSaveName();
                } else {
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }
//            $result = $this->validate(需要验证的数据,设置的验证器);
            $result = $this->validate(request()->post(), 'User');
            $user = new User();
            $user->name = request()->post('name');
            $user->age = request()->post('age');
            $user->password = password_hash(request()->post('password'), PASSWORD_DEFAULT);
            $user->status = request()->post('status');
            $user->logo =  $data['logo'];
//               var_dump($user);exit;
            //把验证码去掉
            unset($data['captcha']);
            if ($user->validate(true)->save()) {

                $this->success("添加成功", 'index');
            } else {
                $this->error("添加失败");
            }
        }
        return $this->fetch();
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //找出对象
        $user = User::get($id);
        if (request()->isPost()) {
            if ($user->save(request()->post())) {
                $this->success("修改成功", 'index');
            } else {
                $this->error("修改失败");
            }
        }
        return $this->fetch("edit", compact('user'));
    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function del($id)
    {
        if (User::get($id)->delete()) {
            $this->success("删除成功", 'index');
        }
    }

    //登录
    public function login($name='',$password=''){
        $user = User::get([
            'name' => $name,

        ]);
//        var_dump($user);exit;
        if (request()->isPost()){
        if($user){
//            echo 111;exit();
            $pwd=Db::name('user')->where(['name'=>$name])->find();
//            var_dump($pwd['password']);exit();
            $pwda=$pwd['password'];
            if( password_verify($password,$pwda)){
                return $this->success('登录成功','/index.php/index/user/index');
            }else{
                return $this->error('密码错误');
            }

        }else{
            return $this->error('登录失败');
        }}
        return $this->fetch('login');
    }
    public function setSession()
    {
        //1.设置Session
        session('name', "admin");
    }

    public function getSession()
    {
        var_dump(session('name'));
    }

    public function setCookie()
    {
        cookie('name', '小明', 3600);
    }

    public function test()
    {
        return add_num(4,5);
    }

//    public function auth()
//    {
//        //创建一个auth实例
//        $auth = Auth::instance();
//        var_dump($auth->check("index",6));
//    }

}
