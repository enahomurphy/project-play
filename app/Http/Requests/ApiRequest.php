<?php
/**
 * Created by PhpStorm.
 * User: intel
 * Date: 9/20/2016
 * Time: 1:10 AM
 */

namespace App\Http\Requests;


class ApiRequest extends Request
{


    public function response(array $errors)
    {
        return response()->json([
            'success' => false,
            'error'  => [
                'message' => "failed to validate fields",
                'errors' => $errors,
                'status_code' => 422
            ]
        ], 422);
    }


}