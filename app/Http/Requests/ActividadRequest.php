<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class ActividadRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $method = $request->method();

        switch($method):

            case 'POST':
                $rules = [
                    'descripcion' => 'required',
                    'fecha_inicio' => 'required',
                    'fecha_fin' => 'required',
                    'colaborador_id' => 'required',
                    'estado_id' => 'required'
                ];
                break;

            case 'PUT':
                $rules = [
                    'descripcion' => 'required',
                    'fecha_inicio' => 'required',
                    'fecha_fin' => 'required',
                    'colaborador_id' => 'required',
                    'estado_id' => 'required'
                ];
                break;
            case 'PATCH':

            default: break;
        endswitch;

        return $rules;
    }
}
