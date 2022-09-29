<?php


namespace app\Model;

use think\model;
use think\response\Json;

class RunoobTblModel extends model
{
    protected $name = 'runoob_tbl';
    //主键
    protected $pk = 'runoob_id';

    public $schema = [
        'runoob_id' => 'int'
    ];

    public function getRunoobTitle()
    {
        /*$res = $this->find(1);

        return $res->getAttr('runoob_author');*/
    }

    public function getStatusAttr($value, $data)
    {

        $arr = [1 => '删除', 2 => '正常', 0 => '待审核'];
        echo $arr[$data['status']];

    }

    /*public function getNothingArr($value, $data)
    {

        $arr = [1 => '删除', 2 => '正常', 0 => '待审核'];
        return $arr[$data['status']];
    }*/
    public function scopeMale($query, $value)
    {
        $query->where('runoob_author', 'like', '%' . $value . '%')->limit(5);
    }
}