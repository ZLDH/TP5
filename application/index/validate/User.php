<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/25 0025
 * Time: 下午 3:22
 */

namespace app\index\validate;


use think\Validate;

class User extends Validate
{
    protected $rule = [
        'name'=>'require|max:25',
        'age'=>'require|number|between:1,120',

    ];
       protected $message = [
        'name.require' => '名称必须',
        'name.max'     => '名称最多不能超过25个字符',
        'age.number'   => '年龄必须是整数',
        'age.between'  => '年龄必须在1~120之间',

        ];
}