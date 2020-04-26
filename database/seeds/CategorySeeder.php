<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_Name ='Без категорий';

        $category = [
            'title' => $category_Name,
            'parent_id' => 1,
            'slug' => Str::slug($category_Name)
        ];

        DB::table('categories')->insert($category);

        for ($i=0; $i < 10; $i++) {
            $category_Name = 'Категория №'.$i;
            $parentId = ($i > 4 )? rand(2, 10) : 1;
            $category = [
                'title' => $category_Name,
                'parent_id' => $parentId,
                'slug' => Str::slug($category_Name),
            ];
            DB::table('categories')->insert($category);
        }
    }
}
