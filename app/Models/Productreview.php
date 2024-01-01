<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productreview extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'review',
        'content',
        'reviewBy',

    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewBy');
    }
}
