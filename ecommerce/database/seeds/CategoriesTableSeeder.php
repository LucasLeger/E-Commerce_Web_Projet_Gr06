<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Action-Aventure',
            'slug' => 'action-aventure',
        ]);

        Category::create([
            'name' => 'Multijoueur Coop',
            'slug' => 'multijoueur-coop',
        ]);

        Category::create([
            'name' => 'RPG',
            'slug' => 'rpg',
        ]);

        Category::create([
            'name' => 'Combat',
            'slug' => 'combat',
        ]);
        
        Category::create([
            'name' => 'FPS',
            'slug' => 'fps',
        ]);
    }
}
