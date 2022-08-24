<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $fillable = [
        'title',
        'author_id'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function bookdetail(){
        return $this->hasOne(BookDetail::class);
    }
}
