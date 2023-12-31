<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;
    protected $table = "authors";
    protected $fillable = ['id', 'a_name', 'a_info', 'image'];
    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
