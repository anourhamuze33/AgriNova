<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class userService
{
    public static function getLogedUser():User
    {
        $user_id = Auth::id();
        if($user_id)
            {
                $user = User::find($user_id);
            }
        return $user;
    }

}
