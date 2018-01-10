<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AddressesTableSeeder::class);
//        $this->call(AdvertAdressesTableSeeder::class);
//        $this->call(AdvertImagesTableSeeder::class);
        $this->call(AdvertStickersTableSeeder::class);
//        $this->call(AdvertsTableSeeder::class);
        $this->call(RecipesTableSeeder::class);
        $this->call(RecipeToCategoryTableSeeder::class);
        $this->call(AdvicesTableSeeder::class);
        $this->call(AdviceImagesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
//        $this->call(OrderTableSeeder::class);
        $this->call(PagesTableSeeder::class);
//        $this->call(ProductImagesTableSeeder::class);
        $this->call(ProductToCategoryTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ReviewAnswersTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(UsersWishlistTableSeeder::class);
    }
}
