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

    public function getLogedUser()
    {
        $user_id = Auth::id();
        if($user_id) {
             $user = $this->userRepository->findById($user_id);
             return $user;
        }
            return;
    }

    public function getUsersWithRole()
    {
        $users = $this->userRepository->getUsersWithRoles();
        return $users;
    }

    public function getStatus()
    {
        return $this->userRepository->getStatus();
    }

    public function getAllUsersDemanding()
    {
        return $this->userRepository->getAllUsersDemanding();
    }

    public function getDemande($user)
    {
        return $this->userRepository->getDemande($user);
    }

}
