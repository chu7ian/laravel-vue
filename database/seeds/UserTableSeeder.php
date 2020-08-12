<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //make()方法创建用户实例(集合)，但是不写入数据库

        //create()方法与make()方法一样，
        //但是create创建完用户实例后会写入数据库，而且是一条一条的写入，
        //当运行填充文件且数据量大的时候，会非常耗时，因而不推荐使用

        //推荐先用make生成用户实例，然后将用户实例转成数组，然后一次性插入整个数组
        $user=factory(\App\User::class)->times(50)->make();

        //临时修改可见属性:需要在一个模型实例中显示隐藏的属性，就可以使用 makeVisible 方法
        \App\User::insert($user->makeVisible(['password','remember_token'])->toArray());
    }
}
