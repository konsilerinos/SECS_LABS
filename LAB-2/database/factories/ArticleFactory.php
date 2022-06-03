<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'  => Str::random(10),
            'token' => Str::random(10),
            'text'  => Str::random(50),
            'dateOfCreated' => date("Y-m-d H:i:s"),
            'author' => Str::random(15)
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'name'  => Str::random(10),
            'token' => Str::random(10),
            'text'  => Str::random(50),
            'dateOfCreated' => date("Y-m-d H:i:s"),
            'author' => Str::random(15)
        ]);
    }

}
