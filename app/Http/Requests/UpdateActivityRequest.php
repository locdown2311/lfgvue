<?php

namespace App\Http\Requests;

use App\Models\Activity;
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
        $activityRoute = $this->route()->parameter('activity');
        return (\Auth::id() == $activityRoute->user_id); // or whatever you've called it
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'horario' => 'required',
            'qtd_jogadores' => 'required',
            'observacao' => 'max:100 | string'
        ];
    }
}
