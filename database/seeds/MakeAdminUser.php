<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class MakeAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('email', 'admin@gmail.com')->count()) {
        	User::create([
        		'email' => 'admin@gmail.com',
        		'name' => 'Admin Name',
        		'password' => '123123',
        		'is_admin' => true,
        	]);
        }
    }
}
