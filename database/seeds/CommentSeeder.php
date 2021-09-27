<?php

use App\Comments;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comments::create([
            'userid' => 4,
            'newsid' => 1,
            'comment' => 'wow its very entertaining, keep it up with the news!',
        ]);
        Comments::create([
            'userid' => 4,
            'newsid' => 1,
            'comment' => 'wow ',
        ]);
        Comments::create([
            'userid' => 4,
            'newsid' => 1,
            'comment' => 'wow Nice',
        ]);
        Comments::create([
            'userid' => 4,
            'newsid' => 1,
            'comment' => 'wow Uwaw',
        ]);
    }
}
