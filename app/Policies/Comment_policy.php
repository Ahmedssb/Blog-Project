<?php

namespace App\Policies;

use App\User;
use App\Model\Comment;

use Illuminate\Auth\Access\HandlesAuthorization;

class Comment_policy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function editComment(User $user, Comment $comment){
        if($comment->user_id == $user->id){
            return true;
        }
        
        return false;
    }
}
