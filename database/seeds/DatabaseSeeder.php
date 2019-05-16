<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ramesh',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => 'Aaryan',
            'email' => 'aryan@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        DB::table('roles')->insert(['role' => 'Admin']);
        DB::table('roles')->insert(['role'=>'Registered User']);

        DB::table('role_user')->insert(['role_id' => 1,'user_id'=>1]);
        DB::table('role_user')->insert(['role_id' => 2,'user_id'=>2]);

        DB::table('orders')->insert([
            'user_id' => 2,
            'payment_method' => 'paypal',
            'transaction_id' => '632842346328',
            'amount'=>500,
            'payment_status'=>'Completed'
        ]);
        DB::table('orders')->insert([
            'user_id' => 2,
            'payment_method' => 'paypal',
            'transaction_id' => '6328423468745',
            'amount'=>400,
            'payment_status'=>'Completed'
        ]);
    }
}
