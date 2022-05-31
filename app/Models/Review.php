<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table='review';
    protected $fillable=[
        'user_id',
        'prod_id',
        'user_review',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* public function rating()
    {
        return $this->belongsTo(Rating::class, 'user_id', 'user_id');
    } */

}
