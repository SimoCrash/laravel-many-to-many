<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['PHP', 'Laravel', 'VueJs', 'Cucina Moderna', 'Piatti Tipici', 'Roma', 'Venezia', 'Emilia-Romagna', 'Acqua Minerale', 'Valle d\'Aosta'];

        foreach ($tags as $tag){
            Tag::create([
                'slug' => Tag::getSlugger($tag),
                'name' => $tag,
            ]);
        }
    }

    
}
