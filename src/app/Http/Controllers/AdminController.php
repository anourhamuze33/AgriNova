<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $usersDemanding = $this->userRepository->getAllUsersDemanding();
        return view('admin.index', compact('usersDemanding'));
    }
}
