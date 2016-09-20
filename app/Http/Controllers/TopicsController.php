<?php

namespace App\Http\Controllers;

use App\Course;
use App\Helper\Transformer\TopicTransformer;
use App\Topic;
use Illuminate\Http\Request;
use App\Http\Requests\TopicRequest;
use App\Http\Requests;

class TopicsController extends ApiController
{

    /**
     * @var TopicTransformer
     */
    private $topicTransformer;

    /**
     * TopicsController constructor.
     * @param $topicTransformer
     */
    public function __construct(TopicTransformer $topicTransformer)
    {
        $this->topicTransformer = $topicTransformer;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->respond([
            'data' => $this->topicTransformer->transformCollection(Topic::all())
        ]);
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
        $topic = Topic::find($id);
        if(! $topic)
            return $this->respondNotFound();

       return $this->respondResourseFound($this->topicTransformer->transform($topic));

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
        $topic = Course::find($id);
        if(! $topic)
            return $this->respondNotFound();

        $topic->fill($request->input())->save();
        return $this->respondResourceCreated("topic has been updated");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic = Course::find($id);
        if(! $topic)
            return $this->respondNotFound();

       $topic->delete()->save();
        return $this->respondResourceCreated("topic has been updated");
    }
}
