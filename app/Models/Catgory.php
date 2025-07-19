<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Catgory extends Model implements HasMedia
{
    protected $fillable = [
        'name',
        'parint', // تأكد من أن الاسم مطابق لحقل parent في الداتابيز
        'discrption'
    ];
    public function products() {
        return $this->hasMany(Product::class,'catgory_id'); // علاقة One-to-Many
    }
    use HasFactory ,InteractsWithMedia;
}
