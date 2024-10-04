<?php

namespace App\Policies;

use App\Models\News_mod;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;
    public function update(?User $user, News_mod $news):bool
    {
        if(!$user){
            return false;
        }
        elseif($user->id == $news->n_author_id){
            return true;
        }
        else{
            return false;
        }

    }
    public function __construct()
    {
        //
    }
}
