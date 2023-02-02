<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public static function getSlugger($text) {
        $slugBase = Str::slug($text);
        $slug = $slugBase;
        $i = 1;
        while(self::where('slug', $slug)->first()){
            $slug = $slugBase . '-' . $i;
            $i++;
        }
        return $slug;
    }
    public $timestamps = false;

}
