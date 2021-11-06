<?php

namespace App\Http\Requests;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseRequest extends FormRequest
{
   /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
    * Get the validation rules that apply to the request.
    * @return array
    */
    public function rules()
    {
        return [
            'name'         => ['required','string','max:255'],
            'description'  => ['nullable','string'],   
            'rating'       => ['nullable','numeric'],
            'views'        => ['nullable','numeric'],
            'hours'        => ['required','numeric'],
            'levels'       => ['required','string',Rule::in(Course::Level_Options)],
            'category_id'  => ['required','numeric','exists:categories,id'],
        ];

    }
}
