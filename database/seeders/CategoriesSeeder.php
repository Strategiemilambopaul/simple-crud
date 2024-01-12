<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = new category();
        $category->titre='science';
        $category->content="la science nous permet d'être toujours à la une avec nos différentes activités";
        $category->save();

        $category1 = new category();
        $category1->titre='la nature';
        $category1->content="la nature est affecter à plusieurs autres faits nous permet d'être toujours à la une avec nos différentes activités";
        $category1->save();

        $category2 = new category();
        $category2->titre='la biologie';
        $category2->content="la biologie aussi nous permet d'effectuer plusieurs trucs nous permet d'être toujours à la une avec nos différentes activités";
        $category2->save();

        $category3= new category();
        $category3->titre="la culture";
        $category3->content="la cultures également nous le permet  nous permet d'être toujours à la une avec nos différentes activités";
        $category3->save();
    }
}
