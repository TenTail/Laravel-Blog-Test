<?php

use App\Models\Comments;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comments::truncate();

        $time = Carbon::now('Asia/Taipei')->subweeks(2);

        foreach (range(1, 10) as $value) {
        	$time->addDay();
        	Comments::create([
        		'name' => '路人甲'.rand(1,10),
        		'content' => '假留言'.$value,
        		'article_id' => rand(1, 8),
        		'created_at' => $time,
	        	'updated_at' => $time,
        	]);
        }
    }
}
