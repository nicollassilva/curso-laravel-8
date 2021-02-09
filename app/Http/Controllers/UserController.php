<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function __construct(User $user)
    {
        $this->repository = $user;
    }
    
    public function index()
    {
        return view('users');
    }
}
