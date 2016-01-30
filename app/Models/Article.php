<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Article extends Model
{
    protected $table = 'articles'; // 指定資料表

    // MassAssigment
    protected $fillable = [
    	'article_title',
    	'article_content',
    	'feature',
    	'page_view',
    	'created_at',
    	'updated_at',
    ];

    public function comments () {
    	return $this->hasMany(Comment::class);
    }
}
