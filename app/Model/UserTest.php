<?php


namespace app\Model;


use think\Model;

class UserTest extends Model
{
    //ģ���޸���
    protected $name = 'testuser';
    public function setPasswordAttr($value)
    {

        return strtoupper($value);
    }
}