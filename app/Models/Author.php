<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Author extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'authors';

    protected $fillable  = [
        'name',
        'country',
        'email'
    ];

    public $translatable = [
        'name',
    ];



    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
