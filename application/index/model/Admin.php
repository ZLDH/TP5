<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/27 0027
 * Time: 下午 10:08
 */

namespace app\index\model;


use think\Model;

class Admin extends Model
{
    protected $table='admin';
    protected  $createTime=false;
    protected  $updateTime=false;
}