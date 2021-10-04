<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Models\Activity;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ActivityController extends Controller
{
    public function index(){
        $dados = Activity::with('category','user')
                            ->orderByDesc('created_at')
                            ->take(3)
                            ->get();
        return Inertia::render('Dashboard',[
            'dados' => $dados
        ]);
    }
    public function create(){
        return Inertia::render();
    }
    public function store (StoreActivityRequest $request){
        $valido = $request->validated();
    }
    public function show($slug){

    }
    public function delete ($id){
        Activity::findOrFail($id)->delete();
        session()->flash('message', 'Tarefa concluida com sucesso.');
    }
}
