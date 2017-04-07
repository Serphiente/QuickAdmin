<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFacturasRequest extends FormRequest
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
            
            'folio' => 'required',
            'vendedor_id' => 'required',
            'fecha' => 'required|date_format:'.config('app.date_format'),
            'cliente_id' => 'required',
            
            
            
            
        ];
    }
}
