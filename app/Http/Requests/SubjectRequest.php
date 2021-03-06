<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SubjectRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|',
            'description' => 'string',
            'course_id' => 'required|unique:coures,id'

        ];
    }
}

