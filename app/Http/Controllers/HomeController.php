<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;

class HomeController extends Controller
{

    private $users;

    public function __construct(User $users){
        $this->users = $users;
    }

    //
    public function admin(){
        $listUsers = $this->users->paginate(5);
        return view('admin.users.index', compact('listUsers'));
    }

    //
    public function home(){
        //$listUser = $this->users->all();
        $points = random_int(100, 500);
        return view('home', compact('points'));
    }
}
