<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        
        $points = $user->points;
        return view('home', compact('points'));
    }
}
