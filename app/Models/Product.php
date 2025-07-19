<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    protected $fillable = [
        'name',
        'discrtion',
        'qualty',
        'price',
        'user_id',
        'category_id'
    ];
    public function category() {
        return $this->belongsTo(Catgory::class,'catgory_id'); // علاقة Many-to-One
    }
    use HasFactory,InteractsWithMedia;
}
