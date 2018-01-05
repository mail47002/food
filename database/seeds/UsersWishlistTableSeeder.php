<?php

use Illuminate\Database\Seeder;

class UsersWishlistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_wishlist')->insert([
            [
                'account_id' => 1,
                'user_id'    => 2
            ], [
                'account_id' => 1,
                'user_id'    => 3
            ]
        ]);
    }
}
