<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'role_id'    => 1,
                'name'       => 'John Doe',
                'image'      => 'uploads/avatar.jpg',
                'phone'      => json_encode(['+380111111111']),
                'email'      => 'john@doe.com',
                'password'   => bcrypt('123456'),
                'verified'   => 1,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'role_id'    => 2,
                'name'       => 'John Smith',
                'image'      => 'uploads/avatar.jpg',
                'phone'      => json_encode(['+380111111111']),
                'email'      => 'john@smith.com',
                'password'   => bcrypt('123456'),
                'verified'   => 1,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'role_id'    => 2,
                'name'       => 'Some User',
                'image'      => 'uploads/avatar.jpg',
                'phone'      => json_encode(['+380111111111']),
                'email'      => 'some@user.com',
                'password'   => bcrypt('123456'),
                'verified'   => 1,
                'created_at' => Carbon::now()->toDateTimeString()
            ], [
                'role_id'    => 2,
                'name'       => 'Four User',
                'image'      => 'uploads/avatar.jpg',
                'phone'      => json_encode(['+380111111111']),
                'email'      => 'four@user.com',
                'password'   => bcrypt('123456'),
                'verified'   => 1,
                'created_at' => Carbon::now()->toDateTimeString()
            ]
        ]);
    }
}
