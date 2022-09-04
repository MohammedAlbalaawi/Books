<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Department extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'departments';

    protected $fillable = [
        'name'
    ];

    public $translatable = [
        'name',
    ];

    public function bookdetails()
    {
        return $this->hasMany(BookDetail::class);
    }
}
