<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{

    /**
     * status code
     *
     * @var int
     */
    protected $statusCode = 200;

    /**
     * get status code
     *
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }


    /**
     * set status code
     *
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }


    /**
     * 404 response
     *
     * @param string $message
     * @return mixed
     */
    public function respondNotFound($message = "resource not found")
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }


    /**
     * 500 error response
     *
     * @param string $message
     * @return mixed
     */
    public function respondInternalError($message = "internal error")
    {
        return $this->setStatusCode(500)->respondWithError($message);
    }


    /**
     * error response
     *
     * @param string $message
     * @return mixed
     */
    public function respondWithError($message = "server Error")
    {
        return $this->respond( [
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }


    /**
     * json response
     *
     * @param $data
     * @param array $headers
     * @return mixed
     */
    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(),  $headers);
    }




}
