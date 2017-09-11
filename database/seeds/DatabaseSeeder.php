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
        $this->call(AdvertAdressesTableSeeder::class);
        $this->call(AdvertCategoriesTableSeeder::class);
        $this->call(AdvertCoockingTimeTableSeeder::class);
        $this->call(AdvertEverydayTermsTableSeeder::class);
        $this->call(AdvertImageTableSeeder::class);
        $this->call(AdvertProductTermsTableSeeder::class);
        $this->call(AdvertStickersTableSeeder::class);
        $this->call(AdvertToCategoryTableSeeder::class);
        $this->call(AdvertsTableSeeder::class);
        $this->call(ArticleCategoryriesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(OptionsTableSeeder::class);
        $this->call(OptionToAdvertCategoryTableSeeder::class);
        $this->call(OptionValuesTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(ProductImageTableSeeder::class);
        $this->call(ProductToCategoryTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ReviewAnsversTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
