<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $articles = [
            [
                "title" => 'Article 1',
                "content" => 'lorem ipsum dolor amet 1',
                "img" => 'img/default.jpg',
                "author" => 'John Doe',
            ],
            [
                "title" => 'Article 1',
                "content" => 'lorem ipsum dolor amet 1',
                "img" => 'img/default.jpg',
                "author" => 'John Doe',
            ],
            [
                "title" => 'Article 1',
                "content" => 'lorem ipsum dolor amet 1',
                "img" => 'img/default.jpg',
                "author" => 'John Doe',
            ],
        ];
        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
