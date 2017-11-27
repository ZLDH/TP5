<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/27 0027
 * Time: 下午 4:52
 */

namespace app\Index\controller;


use think\auth\Auth;
use think\Controller;

class BaseController extends Controller
{
    public function _initialize()
    {
        $controller = request()->controller();
        $action = request()->action();
        $auth = new Auth();
        //1.定义需要排除路由['User/login','User/logou']
//        if ($auth->check($controller."/".$action,6)===false){
//            exit("没有权限");
//        }
        parent::_initialize();
        }
}