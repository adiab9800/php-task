<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active',true)->select('id','name')->get();
        $courses    = Course::where('is_active',true)->get();
        $levels     = Course::Level_Options;
        return view('welcome',compact('categories','courses','levels'));
    }
    public function filter(Request $request)
    {
        $courses = Course::where('is_active',true)->
        where(function ($q) use ($request) 
        {
            if($request->search)
                return $q->where('name', 'like', '%'. $request->search .'%')->orwhere('description', 'like', '%'. $request->search .'%');
        })->
        where(function ($q) use ($request) 
        {
            if($request->category_id)
                return $q->where('category_id',$request->category_id);
        })->
        where(function ($q) use ($request) 
        {
            if($request->levels)
                return $q->where('levels',$request->levels);
        })->
        where(function ($q) use ($request) 
        {
            if($request->rating)
                return $q->where('rating',$request->rating);
        })->
        where(function ($q) use ($request) 
        {
            if($request->hours ==1)
            {
                return $q->where('hours','<',4);
            }
            if($request->hours ==2)
            {
                return $q->where('hours','>=',4)->where('hours','<',8);
            }
            if($request->hours ==3)
            {
                return $q->where('hours','>=',8);
            }
        })->with('category')->get();
        return response()->json($courses);

    }
}
