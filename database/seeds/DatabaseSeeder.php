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
        $this->call(AdvertAdressesTableSeeder::class);
        $this->call(AdvertTypesTableSeeder::class);
        $this->call(AdvertImagesTableSeeder::class);
        $this->call(AdvertStickersTableSeeder::class);
        $this->call(AdvertToCategoryTableSeeder::class);
        $this->call(AdvertsTableSeeder::class);
        $this->call(RecipesTableSeeder::class);
        $this->call(RecipeToCategoryTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(ArticleImageTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(OptionsTableSeeder::class);
        $this->call(OptionToAdvertCategoryTableSeeder::class);
        $this->call(OptionValuesTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(ProductImageTableSeeder::class);
        $this->call(ProductToCategoryTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ReviewAnswersTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
