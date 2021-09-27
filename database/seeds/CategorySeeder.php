<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'WORLD',
            'icon' => 'iconWorldWide.png',
            'url' => 'category-world'
        ]);

        Category::create([
            'name' => 'POLITICS',
            'icon' => 'iconPolitics.png',
            'url' => 'category-politics'
        ]);

        Category::create([
            'name' => 'CULTURE',
            'icon' => 'iconCulture.png',
            'url' => 'category-culture'
        ]);

        Category::create([
            'name' => 'TRAVEL',
            'icon' => 'iconAirPlane.png',
            'url' => 'category-travel'
        ]);
    }
}
