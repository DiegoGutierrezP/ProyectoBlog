<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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

    public function author(User $user, Post $post){

        if($user->id == $post->user_id){
            return true;
        }else{
           return false;
        }
    }

    public function published(?User $user , Post $post){//estar autenticado es opcional '?'adelante de user
        if($post->status == 2){
            return true;
        }else{
            return false;
        }
    }
}
