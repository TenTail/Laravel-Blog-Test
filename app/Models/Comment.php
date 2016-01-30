<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Comment extends Model
{
    protected $table = 'comments'; // 指定資料表

    // MassAssigment
    protected $fillable = [
    	'name',
    	'content',
    	'article_id',
    	'created_at',
    	'updated_at',
    ];

    public function article () {
    	return $this->belongsTo(Article::class);
    }
}
