<?php

namespace App\Http\Controllers;

use App\DataTables\CoursesDataTable;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;


class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CoursesDataTable $dataTable)
    {
        return $dataTable->render('courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id','name')->get();
        $levels = Course::Level_Options;
        return view('courses.create',compact('categories','levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $input = $request->all();
        $input['is_active'] = $request->is_active ? true:false;
        Course::create($input);
        return back()->with('success','Data Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = Category::select('id','name')->get();
        $levels = Course::Level_Options;
        return view('courses.edit',compact('course','categories','levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {
        $input = $request->all();
        $input['is_active'] = $request->is_active ? true:false;
        $course->update($input);
        return back()->with('success','Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return back()->with('success','Data Deleted Successfully');
    }
     /**
     * Change Status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request,Course $course)
    {
        $course->update(['is_active'=>$request->status]);
        return back()->with('success','Data Deleted Successfully');
    }
}
