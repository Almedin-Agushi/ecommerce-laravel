<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slide extends Model
{

    protected $fillable = [
        'user_id',
        'title',
        'subtitle',
        'image',
    ];


    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class);
    }
}
