<?php

namespace App\Http\Controllers;

use App\Course;
use App\Programme;
use Facades\App\Helpers\Json;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $programme_id = $request->input('programme_id') ?? '%';
        $course_title = '%' . $request->input('course') . '%';

        $courses = Course::with('programme')
            ->orderBy('name')
            ->where([
                ['name','like',$course_title],
                ['programme_id','like',$programme_id]
            ])
            ->orWhere([
                ['description','like',$course_title],
                ['programme_id','like',$programme_id]
            ])
            ->get()
        ->makeHidden(['created_at','updated_at']);

        $order = Programme::orderBy('id')->get();


        $programmes = Programme::orderBy('name')
            ->has('courses')
            ->get()
            ->transform(function ($item, $key) {
                $item->name = strtoupper($item->name);
                return $item;
            })
            ->makeHidden(['created_at','updated_at']);


        $result = compact('courses', 'programmes','order');
        Json::dump($result);
        return view('courses.index', $result);
    }

    public function show($id)
    {
        return view('courses.show', ['id' => $id]);
    }
}
