<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'title', 'author', 'published_year', 'stock'];

    // Relasi: Setiap buku milik satu kategori[cite: 3, 5]
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}