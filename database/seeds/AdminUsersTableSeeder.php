<?php

use Illuminate\Database\Seeder;
use App\AdminUser;
use Illuminate\Support\Facades\Hash;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new AdminUser();
        $admin->name = 'dofleini';
        $admin->email = 'dev@dofleini.com';
        $admin->password = Hash::make('test');
        $admin->save();
    }
}
