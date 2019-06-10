<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      $categories = [
        [
          'name' => 'Action'
        ],
        [
          'name' => 'RPG'
        ],
        [
          'name' => 'Romance'
        ],
        [
          'name' => 'Thriller'
        ],
        [
          'name' => 'Comedy'
        ],
      ];


      foreach ($categories as $category) {
        Category::create($category);
      }
    }
  }
