<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;

use App\Course;
use App\Helper\Transformer\CourseTransformer;
use App\Http\Requests\CourseRequest;

class CoursesController extends ApiController
{


    private $courseTransformer;


    /**
     *
     *
     * CoursesController constructor.
     * @param $courseTransformer
     */
    public function __construct(CourseTransformer $courseTransformer)
    {
        $this->courseTransformer = $courseTransformer;

//        $this->middleware('auth.basic');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        return $this->respond([
//
//            'data' => $this->courseTransformer->transformCollection(Course::all())
//
//        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param CourseRequest $request
     * @return mixed
     */
    public function store(CourseRequest $request)
    {

//        $data =  Course::create($request->all());
//        dd(['dddd']);
//        return $this->setStatusCode(201)
//            ->respond([
//                'status' => 'success',
//                'message' => 'resource created'
//            ]);
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);

        if(! $course)
        {
            return $this->respondNotFound();
        }

        return $this->respond([
            'data' => $this->courseTransformer->transform($course->toArray())
        ]);
    }


    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




}
