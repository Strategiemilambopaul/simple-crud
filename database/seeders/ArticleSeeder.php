<?php

namespace Database\Seeders;

use App\Models\article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $article = new article();
        $article->nom="la grammaire";
        $article->content="la grammaire est une science qui étudie la description de la terre sous ses cela traduit la science";
        $article->save();

        $article1 = new article();
        $article1->nom="la physique";
        $article1->content="l'gistoires  est une science qui étudie les faits passées de l'homme la description de la terre sous ses cela traduit la science";
        $article1->save();

        $article2 = new article();
        $article2->nom="le philosophie";
        $article2->content="la maths sont les sciences de calcule est une science qui étudie la description de la terre sous ses cela traduit la science";
        $article2->save();

        $article3 = new article();
        $article3->nom="la langue";
        $article3->content="la langue nous permet de nous exprimer à travers les gens est une science qui étudie la description de la terre sous ses cela traduit la science";
        $article3->save();

        $article4 = new article();
        $article4->nom="la portir";
        $article4->content="la géograhie est une science qui étudie la description de la terre sous ses cela traduit la science";
        $article4->save();
    }
}
