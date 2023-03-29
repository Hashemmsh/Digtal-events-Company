<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    protected $guarded=[];

    use HasFactory , softDeletes , Trans;

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
