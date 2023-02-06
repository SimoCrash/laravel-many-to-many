<?php

use App\Tag;
use App\Post;
use App\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = Category::all()->all();
        $tags = Tag::all()->pluck('id');
        $tagCount = count($tags);
        for ($i = 0; $i < 100; $i++){
            $title = $faker->words(rand(3, 7), true);
            //$title = 'ciao a tutti';
            $post = Post::create([
                'category_id' => $faker->randomElement($categories)->id,
                'slug' => Post::getSlug($title),
                'title' => $title,
                'image' => 'https://picsum.photos/id/' . rand(0, 1000) . '/500/400',
                'content' => $faker->paragraphs(rand(1, 10), true),
                'except' => $faker->paragraph(),
            ]);

            //questa riga scrive nella tabella ponte
            $post->tags()->attach($faker->randomElements($tags, rand(0, ($tagCount > 10) ? 10 : $tagCount)));
        }
    }
}
