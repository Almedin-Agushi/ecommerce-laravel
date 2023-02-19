<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\HtmlString;
use Illuminate\Database\Eloquent\Model;
use App\Models\Presenters\CommentPresenter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model


{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'user_id',
        'body',
        'product_id'
    ];

        public function markdownBody(){

            return new HtmlString(app('markdown')->convertToHtml($this->body));             // __comment__ e ben bold text te komenti
        }

    public function scopeParent(Builder $builder){

        $builder->whereNull('parent_id');
    }

        public function user(){
            return $this->belongsTo(User::class);
        }

    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id')->oldest();
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
