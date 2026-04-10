<?php

namespace App\Services\User;

use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;

class userService
{
    protected UserRepository $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public static function getLogedUser()
    {
        $user_id = Auth::id();
        if($user_id)
            {
                $user = User::find($user_id);
                return $user;
            }
            return;
    }

    public function getUsersWithRole()
    {
        $users = $this->userRepository->getUsersWithRoles();
        return $users;
    }

}
