<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Click extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'click_count'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
