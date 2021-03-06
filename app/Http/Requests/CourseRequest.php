<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CourseRequest extends ApiRequest
{



    /**
     * Determine if the user is authorized to make this request.
     *
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
            'title' => 'required|',
            'destription' => 'string|',
            'class' => 'required|in:ss1,ss2,ss3'
        ];
    }


}
