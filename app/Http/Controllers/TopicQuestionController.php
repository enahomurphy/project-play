<?php

namespace App\Http\Controllers;

use App\Helper\Transformer\TopicQuestionTransformer;
use App\Subject;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\TopicQuestion;
use App\Topic;
use App\Question;

/**
 * Class TopicQuestionController
 * @package App\Http\Controllers
 */
class TopicQuestionController extends ApiController
{

    /**
     * @var
     */
    private $tqTransformer;


    /**
     * TopicQuestionController constructor.
     * @param $tqTransformer
     */
    public function __construct(TopicQuestionTransformer $tqTransformer)
    {
        $this->tqTransformer = $tqTransformer;
    }


    /**
     * Display a listing of the resource.
     *
     * @param $topicId
     * @return \Illuminate\Http\Response
     */
    public function index($topicId)
    {
        return $this->respondResource($this->tqTransformer->transformCollection(Topic::find($topicId)->question));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param $topicId
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($topicId, Request $request)
    {
        $topic = Topic::find($topicId);

        if(! $topic)
            return $this->respondNotFound('Topic with that id not found');

        Question::create($request->all());

        return $this->respondResourceCreated("question created");

    }

    /**
     * Display the specified resource.
     *
     * @param $topicId
     * @param $questionId
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($topicId, $questionId)
    {
        $topic = Topic::find($topicId);
        $subeject = Question::find($questionId);

        if(! $topic)
            return $this->respondNotFound('Topic with that id not found');

        if(! $subeject)
            return $this->respondNotFound('question with that id not found');

        return $this->respondResource($this->tqTransformer->transform($subeject->toArray()));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $topicId
     * @param $questionId
     * @return \Illuminate\Http\Response
     * @internal param $subjectId
     * @internal param int $id
     */
    public function update(Request $request, $topicId, $questionId)
    {
        $topic = Topic::find($topicId);
        $question = Question::find($questionId);

        if(! $topic)
            return $this->respondNotFound('Topic with that id not found');

        if(! $question)
            return $this->respondNotFound('question with that id not found');

        $question->fill($request->input())->save();

        return $this->respondResource($this->tqTransformer->transform($question->toArray()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $topicId
     * @param $questionId
     * @return \Illuminate\Http\Response
     * @internal param $subjectId
     * @internal param int $id
     */
    public function destroy($topicId, $questionId)
    {
        $topic = Topic::find($topicId);
        $question = Question::find($questionId);

        if(! $topic)
            return $this->respondNotFound('Topic with that id not found');

        if(! $question)
            return $this->respondNotFound('question with that id not found');


        $question->delete();

        return $this->respondResourceCreated('resource deleted');
    }
}
