<?php

namespace App\Http\Controllers;

use App\Helper\Transformer\Transfomer;
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
     * @param string $message
     * @return mixed
     */
    public function respondBadRequest($message = "resource mot availabe")
    {
        return $this->setStatusCode(400)->respondWithError($message);
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
     * @param string $message
     * @return mixed
     */
    public function respondResourceCreated($message = "resource successfully created")
    {
        return $this->setStatusCode(201)->respond(array(
            'success' => true,
            'message' => $message,
            'status_code' => $this->getStatusCode()
        ));

    }

    /**
     * error response
     *
     * @param string $message
     * @return mixed
     */
    public function respondWithError($message = "server Error")
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }


    /**
     * @param array $data
     * @return mixed
     */
    public function respondResource($data = [])
    {
        return $this->setStatusCode(200)->respond([
            'success' => true,
            'data' => $data,
            'statu_code' => $this->getStatusCode()
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
        return response()->json($data, $this->getStatusCode(), $headers);
    }


    /**
     * updates a resourse
     *
     * @param Object $class
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function updateResource($class, $id, Request $request)
    {
        $item = $class::find($id);

        if (!$item)
            return $this->respondNotFound();

        $item->fill($request->input())->save();
        return $this->respondResourceCreated('resourse updated');
    }


    /**
     * deletest a resourse
     *
     * @param $class
     * @param $id
     * @return mixed
     */
    public function deleteResource($class, $id)
    {
        $topic = $class::find($id);
        if(! $topic)
            return $this->respondNotFound();

        $topic->delete();
        return $this->respondResourceCreated(("Resource has been deleted"));
    }

    /**
     * show a single resourse
     *
     * @param $class
     * @param $id
     * @param Transfomer $transformer
     * @return json
     */
    public function showResource($class, $id, Transfomer $transformer)
    {
        $subject = $class::find($id);

        if(! $subject)
            return $this->respondNotFound();

        return  $this->respondResource($transformer->transform($subject->toArray()));
    }


}

