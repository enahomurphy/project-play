<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;

use App\Course;
use App\Helper\Transformer\CourseTransformer;
use App\Http\Requests\CourseRequest;

class CoursesController extends ApiController
{


    /**
     * @var CourseTransformer
     */
    private $courseTransformer;

    /**
     * @var
     */
    private $model;


    /**
     *
     *
     * CoursesController constructor.
     * @param CourseTransformer $courseTransformer
     * @param Course $model
     */
    public function __construct(CourseTransformer $courseTransformer, Course $model)
    {
        $this->courseTransformer = $courseTransformer;

        $this->model = $model;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->respondResource($this->courseTransformer->transformCollection($this->model->all()));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param CourseRequest $request
     * @return mixed
     */
    public function store(CourseRequest $request)
    {
        Course::create($request->all());

        return $this->setStatusCode(201)->respondResourceCreated("course created");
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->showResource($this->model, $id, $this->courseTransformer);
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
