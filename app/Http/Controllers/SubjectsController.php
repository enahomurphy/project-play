<?php

namespace App\Http\Controllers;

use App\Helper\Transformer\SubjectTransformer;
use App\Subject;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\SubjectRequest;

class SubjectsController extends ApiController
{

    /**
     * @var SubjectTransformer
     */
    private $subjectTransformer;

    /**
     * @var
     */
    private $model;


    /**
     * SubjectsController constructor.
     * @param SubjectTransformer $subjectTransformer
     * @param Subject $model
     * @internal param Subject $subject
     */
    public function __construct(SubjectTransformer $subjectTransformer, Subject $model)
    {
        $this->subjectTransformer = $subjectTransformer;
        $this->model = $model;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->respondResource($this->subjectTransformer->transformCollection($this->model->all()));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param SubjectRequest $request
     * @return mixed
     */
    public function store(SubjectRequest $request)
    {
        Subject::create($request->all());

        return $this->respondResourceCreated();
    }

    /**
     * Display the specified resource.
     *
     * @param Subject $subject
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject, $id)
    {
        return $this->showResource($subject, $id, $this->subjectTransformer );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param Subject $subject
     */
    public function update($id, Request $request)
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
