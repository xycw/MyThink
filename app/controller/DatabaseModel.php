<?php


namespace app\controller;


use app\Model\RunoobTblModel;
use app\Model\RunoobTblModel as RunoobModel;
use app\Model\User;
use app\Model\UserTest;
use think\response\Json;

class DatabaseModel
{
    public function index()
    {

        return json(RunoobTblModel::select());
    }

    public function insert()
    {
        /*$runs = new RunoobTblModel();
        $runs->runoob_title = '学习Tp';
        $runs->runoob_author = 'Tp教程~~~';
        $runs->submission_date = date("Y-m-d", time());
        $runs->replace()->save();*/

        /*$runs->save([
            'runoob_title' => '学习TP6',
            'runoob_author' => 'TP6教程',
            'submission_date' => date("Y-m-d", time())
        ]);*/

        $runs = UserTest::create(
            ['email'=>'524468939',
                'password'=>'vfdsbvdfbbdfb'], ['email','password'], false
        );
        return $runs;
    }

    public function delete()
    {
        /*$runs = RunoobTblModel::find(27);
        $runs->delete();*/
        $runs = RunoobTblModel::destroy([7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]);
        return dump($runs);
    }

    public function schema()
    {
        //$run = RunoobTblModel::find(27);

        $runs = RunoobModel::withArr('runoob_title', function ($value) {
            return strtolower($value);
        })->find(6);
        //echo $run->status;
        //echo $run->getData('status');
        return json($runs);


    }
}