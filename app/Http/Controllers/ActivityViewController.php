<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ActivityViewController extends Controller
{
    private $busca;
    private $participantes;
    private $participando = false;
    public function show($slug){

        $usuarioAtivo = \Auth::id();
        $atividade = Activity::with('category','user')
            ->where('slug','=',$slug)
            ->get()
            ->map( function ($activity){
                $date = new \Datetime($activity->horario);
                $horario =  $date->format('d/m H:i');
                return[
                    'id' => $activity->id,
                    'descricao' => $activity->category->descricao,
                    'tipo' => $activity->category->tipo,
                    'observacao' => $activity->observacao,
                    'horario' => $horario,
                    'jogadores' => $activity->qtd_jogadores,
                    'criado_por' => $activity->user->name,
                    'slug' => $activity->slug
                ];
            });
        $atividade = $atividade[0];
        $this->participantes = $this->loadParticipantes($atividade['id']);
        $nParticipantes = $this->countPlayers($atividade['id']);

        return Inertia::render('Activity/ViewActivity',[
            'dados' => $atividade,
            'nParticipantes' => $nParticipantes,
            'participando' => $this->checkIfExists($usuarioAtivo,$atividade['id']),
            'participantes' => $this->participantes
        ]);

    }

    public function joinActivity($id){
        $usuarioAtivo = \Auth::id();

        $dados = User::findOrFail($usuarioAtivo);

        if($this->checkIfExists($usuarioAtivo,$id) == false){
            $dados->activities()->attach($id);
            $this->participando = true;
            session()->flash('message','Registrado com sucesso.');
        }else{
            session()->flash('message','Você ja está participando dessa atividade.');
        }
        return redirect('/dashboard');
    }
    public function quitActivity($id){
        $usuarioAtivo = \Auth::id();
        $dados = User::findOrFail($usuarioAtivo);

        if($this->checkIfExists($usuarioAtivo,$id)){
            $dados->activities()->detach($id);
            $this->participando = false;
            session()->flash('message','Você saiu da lista, que pena');
        }else{
            session()->flash('message','Você não está na lista');
        }
        return redirect('/dashboard');
    }
    public function checkIfExists($user_id,$activity_id){
        return DB::table('activity_user')
            ->where('activity_id','=',$activity_id)
            ->where('user_id','=',$user_id)
            ->exists();
    }
    public function loadParticipantes($id){
        $this->busca = $id;
        return User::whereHas('activities', function ($query) {
            return $query->where('activities.id', '=', $this->busca);
        })->get();

    }
    public function countPlayers($activity_id){
        return DB::table('activity_user')
            ->where('activity_id',$activity_id)
            ->count();
    }
}
