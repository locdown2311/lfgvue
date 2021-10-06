<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ActivityController extends Controller
{
    public function index()
    {
        $dados = Activity::with('category', 'user')
            ->orderByDesc('created_at')
            ->take(3)
            ->get()->map(function ($activity) {
                $date = new \Datetime($activity->horario);
                $horario = $date->format('d/m H:i');
                return [
                    'id' => $activity->id,
                    'descricao' => $activity->category->descricao,
                    'tipo' => $activity->category->tipo,
                    'observacao' => $activity->observacao,
                    'horario' => $horario,
                    'jogadores' => $activity->qtd_jogadores,
                    'usuario' => $activity->user->name,
                    'slug' => $activity->slug
                ];
            });
        return Inertia::render('Dashboard', [
            'dados' => $dados
        ]);
    }

    public function create()
    {
        $categorias = Category::all()->map(function ($category) {
            return [
                'id' => $category->id,
                'tipo' => $category->tipo,
                'descricao' => $category->descricao
            ];
        });
        $atividades_usu = Activity::with('category')
            ->where('user_id', \Auth::id())
            ->paginate(4);

        return Inertia::render('Activity/CreateActivity', [
            'categorias' => $categorias,
            'atividades' => $atividades_usu

        ]);
    }

    public function edit(Activity $id)
    {

        $descricao = $id->category()->get();
        return Inertia::render('Activity/EditActivity', [
            'atividade' => $id,
            'descricao' => $descricao[0]->descricao
        ]);
    }

    public function update(UpdateActivityRequest $request, Activity $id)
    {

        $valido = $request->validated();
        $atividade = $id;
        $atividade->horario = $valido['horario'];
        $atividade->qtd_jogadores = $valido['qtd_jogadores'];
        $atividade->observacao = $valido['observacao'];
        $atividade->save();

        session()->flash('message', 'Tarefa editada.');
        return redirect()->route('activity.index');

    }

    public function store(StoreActivityRequest $request)
    {
        $valido = $request->validated();
        $dados = new Activity();
        $dados->user_id = \Auth::id();
        $dados->horario = $valido['horario_atv'];
        $dados->slug = $random = Str::random(8) . $valido['qtd_jogadores'];
        $dados->qtd_jogadores = $valido['qtd_jogadores'];
        $dados->observacao = $valido['observacao'];
        $dados->category()->associate($valido['categoria_id']);
        $dados->save();
        session()->flash('message', 'Tarefa cadastrada.');
        return Redirect::route('activity.index');
    }

    public function delete($id)
    {
        Activity::findOrFail($id)->delete();
        session()->flash('message', 'Tarefa concluida com sucesso.');
    }
}
