<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function faqs()
    {
        return $this->belongsToMany(FAQ::class, 'category_faq', 'category_id', 'faq_id');
    }
}