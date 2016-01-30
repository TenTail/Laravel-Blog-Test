<?php

use App\Models\Articles;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 新增假資料
     * @return void
     */
    public function run()
    {
    	Articles::truncate();
		
		$time = Carbon::now('Asia/Taipei')->subweeks(3);
    	
    	foreach (range(1, 20) as $value) {
    		$time->addDay();
    		Articles::create([
	        	'article_title' => '文章測試'.$value,
	        	'article_content' => '這是一篇測試文章，第'.$value.'篇。',
	        	'feature' => rand(0, 1),
	        	'page_view' => rand(0, 200),
	        	'created_at' => $time,
	        	'updated_at' => $time,
	        ]);
    	}
    }
}
