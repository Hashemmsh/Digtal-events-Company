<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $guarded=[];
    use HasFactory , softDeletes , Trans;

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
