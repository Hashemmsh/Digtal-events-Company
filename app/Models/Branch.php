<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    protected $fillable = [
        'title',
        'user_id',
    ];
    use HasFactory , softDeletes , Trans;

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function buying()
    {
        return $this->hasMany(Buying::class);
    }
}
