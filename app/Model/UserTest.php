<?php


namespace app\Model;


use think\Model;

class UserTest extends Model
{
    //Ä£ÐÍÐÞ¸ÄÆ÷
    protected $name = 'testuser';
    public function setPasswordAttr($value)
    {

        return strtoupper($value);
    }
}