<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookDetail extends Model
{
    use HasFactory;

    protected $table = 'book_details';
    protected $fillable = [
        'book_id',
        'department_id',
        'language',
        'year',
        'image',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
