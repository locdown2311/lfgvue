<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $activity = $this->route()->parameter('id'); // whatever the parameter is called
        return (\Auth::id() == $activity->user_id); // or whatever you've called it

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'categoria_id' => 'required | numeric',
            'horario_atv' => 'required | date',
            'qtd_jogadores' => 'required | numeric',
            'observacao' => 'max:100 | string'
        ];
    }
}
