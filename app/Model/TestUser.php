<?php


namespace app\Model;


use think\Model;

class TestUser extends Model
{
    //模型修改器
    protected $name = 'testuser';

    public function setPasswordAttr($value)
    {

        return strtoupper($value);
    }

    public function scopeMale($query)
    {

        $query->where('gender', '1')->limit(5);

    }
}