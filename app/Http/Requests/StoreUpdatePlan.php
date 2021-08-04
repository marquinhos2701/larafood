<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePlan extends FormRequest
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
        $url = $this->segment(3); /** Pega o segmento 3 da url, o valor name passado na url */

        return [
            'name' => "required|min:3|max:255|unique:plans,name,{$url},url", /** unique:plans,name,{$url},url --- foi adicionado para poder permitir a edição na hora da validação que não permite a duplicação do campo */
            'description' => 'nullable|min:3|max:255',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
        ];
    }
}
