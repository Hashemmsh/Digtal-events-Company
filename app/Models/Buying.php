<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buying extends Model
{
    protected $guarded=[];
    use HasFactory , softDeletes,Trans;

    public function product()
    {
        return $this->belongsTo(Product::class)->withDefault();
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class)->withDefault();
    }
}
