<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = ['id', 'pro_name', 'pro_price', 'image', 'pro_price_sale', 'pro_stock', 'pro_status', 'pro_description', 'pro_category_id', 'pro_publisher_id', 'pro_supplier_id', 'pro_author_id', 'quantity'];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
    public function rating()
    {
        return $this->belongsTo(Rating::class);
    }
}
