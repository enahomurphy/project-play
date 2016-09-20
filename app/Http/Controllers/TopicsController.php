<?php

namespace App\Http\Controllers;

use App\Course;
use App\Helper\Transformer\TopicTransformer;
use App\Subject;
use App\Topic;
use App\TopicQuestion;
use Illuminate\Http\Request;
use App\Http\Requests\TopicRequest;
use App\Http\Requests;

class TopicsController extends ApiController
{

    private $model;


    /**
     * @var TopicTransformer
     */
    private $topicTransformer;

    /**
     * TopicsController constructor.
     * @param TopicTransformer $topicTransformer
     * @param Topic $model
     */
    public function __construct(TopicTransformer $topicTransformer, Topic $model)
    {
        $this->topicTransformer = $topicTransformer;
        $this->model = $model;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->respondResource($this->topicTransformer->transformCollection($this->model->all()));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param TopicRequest $request
     * @return mixed
     */
    public function store(TopicRequest $request)
    {
        Topic::create($request->all());

        return $this->setStatusCode(201)->respondResourceCreated("topic created");
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return $this->showResource($this->model, $id, $this->topicTransformer);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->updateResource($this->model, $id, $request);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return $this->deleteResource($this->model, $id);
    }
}
