<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Models\Activity;
use Inertia\Inertia;

class ActivityController extends Controller
{
    public function index(){
        $dados = Activity::with('category','user')
                            ->orderByDesc('created_at')
                            ->take(3)
                            ->get()->map(function ($activity){
                                $date = new \Datetime($activity->horario);
                                $horario =  $date->format('d/m H:i');
                                return [
                                    'id' => $activity->id,
                                    'descricao' => $activity->category->descricao,
                                    'tipo' => $activity->category->tipo,
                                    'observacao' => $activity->observacao,
                                    'horario' => $horario,
                                    'jogadores' => $activity->qtd_jogadores,
                                    'usuario' => $activity->user->name,
                                    'slug' => $activity->slug
                                ];});
        return Inertia::render('Dashboard',[
            'dados' => $dados
        ]);
    }
    public function create(){
        return Inertia::render('Activity/CreateActivity');
    }
    public function store (StoreActivityRequest $request){
        $valido = $request->validated();
    }
    public function delete ($id){
        Activity::findOrFail($id)->delete();
        session()->flash('message', 'Tarefa concluida com sucesso.');
    }
}
