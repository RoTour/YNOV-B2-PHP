<?php

use App\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
                "title" => "Hello world",
                "description" => "First article description",
                "published" => true
            ],
            [
                "title" => "Second Article",
                "description" => "Second article description",
                "published" => true
            ],
        ]);

        factory(Article::class, 20)->create()->each(function ($article) {
            $article->save();
        });
    }
}
