<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();


        //-- grap the user roles
        $adminRole = Role::where('name','admin')->first();
        $modRole = Role::where('name','moderate')->first();
        $memberRole = Role::where('name','member')->first();

        //-- create user
        $adminUser = User::create([
            'name' => 'admin user',
            'email' => 'admin@test.com',
            'password' => Hash::make('password')
        ]);


        $modUser = User::create([
            'name' => 'mod user',
            'email' => 'mod@test.com',
            'password' => Hash::make('password')
        ]);

        $modUser1 = User::create([
            'name' => 'mod user1',
            'email' => 'mod1@test.com',
            'password' => Hash::make('password')
        ]);
        $modUser2 = User::create([
            'name' => 'mod user2',
            'email' => 'mod2@test.com',
            'password' => Hash::make('password')
        ]);

        $memberUser = User::create([
            'name' => 'member user',
            'email' => 'test@test.com',
            'password' => Hash::make('password')
        ]);
        
        $memberUser1 = User::create([
            'name' => 'member user1',
            'email' => 'test1@test.com',
            'password' => Hash::make('password')
        ]);
        $memberUser2 = User::create([
            'name' => 'member user2',
            'email' => 'test2@test.com',
            'password' => Hash::make('password')
        ]);
        $memberUser3 = User::create([
            'name' => 'member user3',
            'email' => 'test3@test.com',
            'password' => Hash::make('password')
        ]);



        $adminUser->roles()->attach($adminRole);
        $modUser->roles()->attach($modRole);
        $modUser1->roles()->attach($modRole);
        $modUser2->roles()->attach($modRole);


        $memberUser->roles()->attach($memberRole);
        $memberUser1->roles()->attach($memberRole);
        $memberUser2->roles()->attach($memberRole);
        $memberUser3->roles()->attach($memberRole);

    }
}
