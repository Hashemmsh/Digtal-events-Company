<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $guarded=[];
    use HasFactory , softDeletes , Trans;

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function service()
    {
        return $this->belongsTo(Service::class)->withDefault();
    }
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }
    public function buying()
    {
        return $this->hasMany(Buying::class);
    }
    public function image_product()
    {
        return $this->hasMany(Image_product::class);
    }
}
