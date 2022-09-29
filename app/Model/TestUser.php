<?php


namespace app\Model;


use think\Model;

class TestUser extends Model
{
    //Ä£ĞÍĞŞ¸ÄÆ÷
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