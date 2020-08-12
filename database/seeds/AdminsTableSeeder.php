<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = factory(\App\Model\Admin::class,5)->make();
        \App\Model\Admin::insert($admin->toArray());
    }
}
