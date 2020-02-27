<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class GroupRequest extends FormRequest
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
        
        switch ($request->searchQuery) {
            
            case "memberSearch":
            return [
                'user_id_0'   =>  'required|numeric',
                'searchQuery' =>  'required',
            ];
            break;

            case "createGroup":
            return [
                'name'        => 'required|max:50',
                'searchQuery' => 'required',
            ];
            break;
        }
    }
}
