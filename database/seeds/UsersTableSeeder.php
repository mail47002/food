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
        $userId = DB::table('users')->insertGetId([
            'role_id'    => 1,
            'name'       => 'John Doe',
            'image'      => 'uploads/avatar.jpg',
            'phone'      => json_encode(['+380111111111']),
            'email'      => 'john@doe.com',
            'password'   => bcrypt('123456'),
            'verified'   => 1,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        DB::table('addresses')->insert([
            'user_id'    => $userId,
            'city'       => 'Vinnica',
            'street'     => 'Strilecka',
            'build'      => 75,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
    }
}
