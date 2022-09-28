<?php


namespace app\controller;


use app\Model\RunoobTblModel;
use think\facade\Db;
use think\Model;

class DatabaseTest
{
    public function index()
    {

        //$res = Db::table('runoob_tbl')->where('runoob_id','1')->find();
        //$res = Db::table('runoob_tbl')->where('runoob_id')->findOrFail();
        //$res = Db::table('runoob_tbl')->where('runoob_id','12')->selectOrFail();
        //$res = Db::table('app_user')->selectOrFail()->toArray();
        //$res = Db::name('runoob_tbl')->selectOrFail()->toArray();
        //echo Db::table('runoob_tbl')->where('runoob_id',2)->value('runoob_title');
        //$res =  Db::table('runoob_tbl')->column('runoob_title','runoob_id');
        /*Db::name('app_user')->chunk(3,function ($user){
            foreach ($user as $a ){
                dump($a);
            }
            echo 1;
        });*/
        /*$results = Db::name('runoob_tbl')->cursor();
        foreach ($results as $result){
            dump($result);
        }*/
        $query = Db::name('runoob_tbl');
        //$queryres= $query->where('runoob_id')->find();
        $res = $query->order('runoob_id', 'desc')->select();
        //$res = $query->removeOption('order')->select();
        return Db::getlastsql();
    }


    public function getmsg()
    {
        $res = RunoobTblModel::select();
        return json($res);
    }

    public function dbInsert()
    {
        $data = [
            'runoob_id' => 13,
            'runoob_title' => 'Goo',
            'runoob_author' => '菜鸟2.2',
            'submission_date' => date("Y-m-d", time()),
        ];
        //Db::name('runoob_tbl')->insert($data);
        //$res = Db::name('runoob_tbl')->strict(false)->insert($data);
        //$res = Db::name('runoob_tbl')->replace()->insert($data);
        //$res = Db::name('runoob_tbl')->replace()->insertGetId($data);
        //$res = Db::name('runoob_tbl')->save($data);
        //return $res;
    }

    public function dbInsertAll()
    {
        /*$data = [
            'runoob_title' => 'Goo',
            'runoob_author' => '菜鸟2.2',
            'submission_date' => date("Y-m-d", time()),
        ];*/
        $dataAll = [
            [
                'runoob_title' => 'Goo.1',
                'runoob_author' => '菜鸟2.3',
                'submission_date' => date("Y-m-d", time()),
            ],
            [
                'runoob_title' => 'Goo.2',
                'runoob_author' => '菜鸟2.4',
                'submission_date' => date("Y-m-d", time()),
            ]
        ];

        //Db::name('runoob_tbl')->insertAll($dataAll);
        //Db::name('runoob_tbl')->field('runoob_id,runoob_title,runoob_author')->insert($data);

        return Db::getlastsql();

    }

    public function dbUpdate()
    {
        $data = [
            'runoob_id' => 13,
            'runoob_title' => 'Goo11',
            'runoob_author' => '菜鸟2.2',
            'submission_date' => date("Y-m-d", time()),
        ];
        //return Db::name('runoob_tbl')->update($data);
        //$res = Db::name('runoob_tbl')->where('runoob_id',13)->exp('runoob_title','UPPER(runoob_title)')->update();
        //$res = Db::name('app_user')->where('id',11)->inc('age')->dec('age',2)->update();
        /*Db::name('app_user')->where('id', 1)->update([
            'password' => Db::raw('UPPER(password)'),
            'age' => Db::raw('age-10'),
            'phone' => Db::raw('phone+10'),
        ]);*/
        //Db::name('app_user')->where('id',1)->save(['name'=>'测试']);
        return Db::getlastsql();
    }

    public function dbDelete()
    {
        Db::name('app_user')->delete(1);
        Db::name('app_user')->where('id', 2)->delete();
        return Db::getlastsql();
    }

    public function dbquery()
    {
        //$user = Db::name('app_user')->where('id','=',3)->find();
        //$user = Db::name('runoob_tbl')->where('runoob_id', '<>', 3)->select();
        //$user = Db::name('runoob_tbl')->where('runoob_title', 'like', '学习%')->select();
        //$user = Db::name('runoob_tbl')->where('runoob_title', 'like',['学习%','菜鸟%'],'or')->select();
        $user = Db::name('runoob_tbl')->where('submission_date', 'null')->select();
        //return $user;
        return Db::getlastsql();
    }

    public function time()
    {
        $res = DB::name('app_user')->whereTime('create_time', '>', '2022-9-1')->find();
        //return json($res);
        return Db::getlastsql();
    }

    public function ploy()
    {
        //$res = DB::name('app_user')->count();
        //$res = DB::name('app_user')->max('id');
        //$res = DB::name('app_user')->min('phone',false);
        //$res = DB::name('app_user')->avg('age',false);
        //$res = DB::name('app_user')->sum('age',false);
        //$res = DB::name('app_user')->fetchSql(true)->select();
        //$uid = Db::name('student')->field('id')->where('sex', '男')->buildSql();
        //$name = Db::name('score')->where('stu_id', 'exp', 'in' . $uid)->select();
        $result = Db::name('student')->where('id', 'in', function ($query) {
            $query->name('score')->field('stu_id')->where('sex', '男');
        });
        return Db::getlastsql();
        return json($result);
    }

    public function linkUp()
    {
        $res = Db::name('student')->where('id', '>', 902)->select();
        $res = Db::name('score')->where([
            'grade' => 88,
            'stu_id' => 906
        ])->select();

        /*$res = Db::name('score')->where([
            ['stu_id', '=', 906],
            ['grade', '>', 85]
        ])->select();*/

        /*$map[] = ['sex', '=', '男'];
        $map[] = ['birth', 'in', [1985, 1986, 1988]];
        $res = Db::name('student')->where($map)->select();*/

        //$res = Db::name('student')->where('sex="男" AND birth IN (1985, 1986, 1988)')->select();

        $res = Db::name('student')->field('sex,name,address')->select();
        //$res = Db::name('score')->fieldRaw('SUM(grade)')->select();
        return Db::getlastsql();
        return json($res);
    }
    public function linkDown()
    {
        $res = Db::name('app_user')->page(2,5)->select();
        //Db::name('student')->fieldRaw('');
        return Db::getlastsql();
        return json($res);
    }
    public function advanced()
    {
        Db::name('runoob_tbl')->withAttr('runoob_title',function ($value,$data){
            dump($data);
        })->select();

        /*Db::name('app_user')->where('name|password','like','xiao%')->select();
        Db::name('app_user')->whereColumn()->select();*/

        return Db::getlastsql();
    }
    public function speedy()
    {
        RunoobTblModel::select();
        Db::name('app_user')->whereEmail('2548928007qq.com')->find();

        return Db::getlastsql();
    }
}