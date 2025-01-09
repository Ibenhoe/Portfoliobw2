<?php

     namespace App\Models;

     use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

     class FAQ extends Model
     {
        use HasFactory;

          protected $guarded = [];
          protected $table = 'faqs';
          public function categories()
        {
            return $this->belongsToMany(Category::class, 'category_faq', 'faq_id', 'category_id');
       }

   }