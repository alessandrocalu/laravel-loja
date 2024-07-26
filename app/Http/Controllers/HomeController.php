<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;
use App\Points;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    private $users;

    public function __construct(User $users){
        $this->users = $users;
    }

    public function admin(){
        $listUsers = $this->users->where('type', '!=', 'aluno')->paginate(50);
        return view('admin.users.index', compact('listUsers')); 
    }

    public function alunos(){
        $order = request('order', 'matricula');
        $listUsers = $this->users->where('type', 'aluno')->orderBy($order, 'ASC')->paginate(50);
        return view('admin.users.aluno', compact('listUsers')); 
    }

    public function home(){
        $user = Auth::user();
        $points = $user->points;
        return view('home', compact('points'));
    }
    
    public function addPoints($id)
    {
        if ($user = $this->users->find((int)$id)) {
            return view('admin.users.plus', compact('user'));
        }    
        return response('Not Found', 404);
    }
    
    public function storeAddPoints(Request $request)
    {
        $id = $request->input("id");

        if ($user = $this->users->find((int)$id)) {
            $pontos = $request->input("pontos");
            $user->points += $pontos;
            $user->save();

            $motivo = $request->input("motivo");
            
            Points::create([
                'motivo' => $motivo,
                'pontos' => $pontos,
                'user_id' => $id
            ]);
            
            
            return redirect('/alunos');
        }    
        return response('Not Found', 404);
    }

    public function removePoints($id)
    {
        if ($user = $this->users->find((int)$id)) {
            return view('admin.users.minus', compact('user'));
        }    
        return response('Not Found', 404);
    }

    public function storeRemovePoints(Request $request)
    {
        $id = $request->input("id");

        if ($user = $this->users->find((int)$id)) {

            $pontos = $request->input("pontos");
            $user->points -= $pontos;
            $user->save();
            
            $pontos = 0-$pontos;
            $motivo = $request->input("motivo");

            Points::create([
                'motivo' => $motivo,
                'pontos' => $pontos,
                'user_id' => $id
            ]);
           
            return redirect('/alunos');
        }
        return response('Not Found', 404);
    }
}
