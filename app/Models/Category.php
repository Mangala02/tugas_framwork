<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // Relasi One-to-Many: Satu kategori memiliki banyak buku[cite: 3, 5]
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}