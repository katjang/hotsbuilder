<?php

use App\Build;
use App\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{

    private $someComments = [
        'yes',
        'i agree',
        'i dont agree',
        'Yall need jesus',
        'u suck',
        'no u',
        'Its better to use a different skill at level 4',
        'come at me',
        'nice meme',
        'I think you\'re not being serious...',
        'gr8 b8 m8 i r8 8/8',
        'solid advice!'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->createComment(Build::inRandomOrder()->first());

        for($i = 0; $i < 50; $i++){
            if(rand(1,2) == 1){
                $this->createComment(Build::inRandomOrder()->first());
            }else{
                $this->createComment(Comment::inRandomOrder()->first());
            }
        }

    }

    private function createComment($on){
        $comment = new Comment;
        $comment->body = $this->someComments[rand(0, count($this->someComments)-1)];
        $comment->user_id = rand(1,3);
        $on->comments()->save($comment);
    }
}
