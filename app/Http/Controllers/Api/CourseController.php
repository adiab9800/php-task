<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CourseResource;
use App\Models\Course;

class CourseController
{
    public function index()
    {

        $data = CourseResource::collection(Course::paginate());
        return response()->json($data);
    }

}
