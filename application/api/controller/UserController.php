<?php

namespace app\api\controller;

use app\index\model\Admin;
use app\index\model\User;
use think\Controller;
use think\Db;
use think\Request;

class UserController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $users = User::all();
        return api_json($users);
    }
//登录
    public function login($username, $pwd)
    {
        //1.通过用户名确定用户是否存在
        $user = Db::name("user")->where(['username' => $username])->find();
        //2.如果不存在
        if ($user) {
            //2.1 判断密码是否正确
            if (password_verify($pwd, $user['password'])) {
                //查出当前用户等待付款的订单
                $waitPayCount=Db::name("order")->where(['user_id'=>$user['id'],'status'=>1])->count();
                //成功
                $result = [
                    "id" => $user['id'],
                    "userName" => $user['username'],
                    "userIcon" => "",
                    "waitPayCount" => $waitPayCount,
                    "waitReceiveCount" => 5,
                    "userLevel" => 5
                ];
                return api_json($result);
            } else {
                return api_json(null, false, "密码错误");
            }
        } else {
            //3.不存在
            return api_json(null, false, "用户名不存在");
        }
    }

    public function regist()
    {

        $admin = new Admin();
       $admin->username=request()->post('username');
       $admin->password=request()->post('pwd');
      // $admin->psaaword=$user['pwd'];
        //判断添加用户是否成功
        if( $admin->save()){
            $admin=[
                'id'=>$admin->id
            ];
            return api_json($admin);
        }else{
            return api_json(null, false, "注册失败");
        }
    }
//首页
    public function banner($adKind)
    {
        $user = Db::name("user");
        $result = [
            "id" => 1,
            "type" => 2,
            "adUrl" => "https://www.baidu.com/img/bd_logo1.png",
            "webUrl" => "https://www.baidu.com",
            "adKind" => $adKind,
        ];
        return api_json($result);
    }

//猜你喜欢
    public function getYourFav(){
   $result= [
       "total"=> 2,
       "rows"=> [
           [
               "price"=> 50,
               "name"=> "商品名称",
               "iconUrl"=> "商品图片",
               "productId"=> 3
           ]
       ]
   ];
   return api_json($result);
}
//分类列表
    public function category()
    {
        $good = Db::name("goods_category")->select();
        $a=[];
        foreach ($good as $k=>$v){
            $restul=[
                $a=[
                    "id"=> $good[$k]['id'],
                    "bannerUrl"=> "http://oyvgmuh04.bkt.clouddn.com/1511078192",
                    "name"=> $good[$k]['name'],
                ]
            ];
        }

    return api_json($restul);
}
//品牌列表
    public function brand($id)
    {
        $brand = Db::name("brand")->where(['id'=>$id])->find();
        $restul=[

                "id"=>$brand['id'] ,
            "name"=> $brand['name']

        ];
        return api_json($restul);
}
//商品信息
    public function productInfo()
    {
        $info = Db::name("goods")->select();
        foreach ($info as $k=>$v){
            $restul=[
                [
                    "id"=> $info[$k]['id'],
                    "imgUrls"=> [
                        "https://www.baidu.com/img/bd_logo1.png",
                        "商品图片路径"
                    ],
                    "price"=> $info[$k]['shop_price'],
                    "ifSaleOneself"=> 1,
                    "name"=> $info[$k]['name'],
                    "recomProductId"=> "推荐商品id",
                    "stockCount"=> $info[$k]['stock'],
                    "commentCount"=> 100,
                    "typeList"=> [
                        "麦片巧克力",
                        "商品版本"
                    ],
                    "favcomRate"=>'98%',
                    "recomProduct"=>"推荐商品标题"
                ]
            ];
        }

        return api_json($restul);
}
//商品评论
    public function commentCount()
    {
        $restul=[
            [
                "moderateCom"=> 200,
        "allComment"=> 600,
        "hasImgCom"=> 100,
        "negativeCom"=> 0,
        "positiveCom"=> 300
            ]
        ];
        return api_json($restul);
}
//某种评论类型
    public function commentDetail()
    {
        $restul=[
            [
                "id"=> 1,
            "imgUrls"=>  "https://www.baidu.com/img/bd_logo1.png",
            "rate"=> 33,
            "loveCount"=> 44,
            "commentTime"=> "2016-03-06 21:55:40（评论时间）",
            "buyTime"=> "2016-03-02 11:12:19（购买时间）",
            "userLevel"=> 15,
            "subComment"=> 689,
            "userName"=> "2",
            "comment"=> "评论内容",
            "userImg"=> "用户头像路径",
            "productType"=> "产品版本类型"
            ]
        ];
        return api_json($restul);
}
//购物车
    public function shopCar($id)
    {
        $info = Db::name("cart")->where(['id'=>$id])->find();
//        foreach ($info as $k=>$v){
        $restul=[
            [
                "id"=> $info['id'],
           "buyCount"=>  $info['num'],
           "storeName"=> "商店名称",
           "pprice"=> 15,
           "pimageUrl"=> "商品图片路径",
           "pname"=> "商品名称",
           "pid"=> 2,
           "stockCount"=> 36,
           "storeId"=> 1,
           "pversion"=> "商品版本"
            ]
        ];
//    }
        return api_json($restul);

}
    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @param  int $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }

    public function test(){
        $str='{"total": "5","rows": [{"allPrice": "50","pointPrice": "30","iconUrl": "商品图片路径","timeLeft": 50,
          "type": 1,"productId": 3}]}';
 dump(json_decode($str,true));
    }
}
