<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestOT extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'Cliente'=> ['required', 'string', 'max:100'],
            'CentroCostos'=> ['required', 'string', 'max:10'],
            'Kilometraje'=> ['required'],
            'Combustible'=> ['required', 'string', 'max:100'],
            'Conductor'=> ['required', 'string', 'max:100'],
            'Encargado'=> ['required', 'string', 'max:100'],
            'Cia'=> ['required', 'string', 'max:10'],
            //'FechaFinal'=> ['required'],
        ];
    }
}

