<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $userController = new UserController();

        $users =  $userController->getUsers();
        return view('dashboard', ['users'=>$users]);
    }
}
