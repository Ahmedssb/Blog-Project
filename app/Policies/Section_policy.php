<?php

namespace App\Policies;

use App\User;
use App\Model\Section;
use Illuminate\Auth\Access\HandlesAuthorization;

class Section_policy
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
    public function before(User $user){
        if($user->rule=='admin'){
            return true;
        }
    }
    public function control_post(User $user,Section $section){
        if($user->id==$section->admin_id){
            return true;
        } 
         return false;
    }
}
