<?php

namespace Database\Seeders;

use App\Models\Category;
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
            'name' => 'BackEnd'
        ]);
        Category::create([
            'name' => 'FrontEnd'
        ]);
        Category::create([
            'name' => 'Android'
        ]);
        Category::create([
            'name' => 'Website'
        ]);
        Category::create([
            'name' => 'UI/UX'
        ]);
    }
}
