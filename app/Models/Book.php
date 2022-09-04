<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Book extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'books';
    protected $fillable = [
        'title',
        'author_id'
    ];

    public $translatable = [
        'title'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function bookdetail()
    {
        return $this->hasOne(BookDetail::class);
    }
}
