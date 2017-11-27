<?php

namespace app\index\model;

use think\Model;

class User extends Model
{

    public function getStatusAttr($value,$data)
    {
        //dump($data);exit;
//        var_dump($value);exit;
        $status = [0=>'删除',1=>'禁用',2=>'正常',3=>'待审核'];
        return $status[$data['status']];
    }
}
