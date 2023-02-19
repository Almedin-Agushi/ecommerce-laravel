<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{

    protected $fillable = [
        'user_id',
        'name',
        'qty',
        'price',
        'storage',
        'color',
        'description',
        'image',
        'category_id',
    ];


    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->belongsToMany(Order::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
