<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Article extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'contant',
        'image',
        'category_id',
        'is_published'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public static function add(array $input) {
        $article = new static;
        $article->fill($input);
        $article->content = $input['text'];
        $article->category_id = $input['category'];
        $article->save();

        return $article;
    }

    public function getPublishStatus() {
        if($this->is_published) {
            return '<span class="badge text-bg-success">Да</span>';
        }

        return '<span class="badge text-bg-danger">Нет</span>';  
    }
}
