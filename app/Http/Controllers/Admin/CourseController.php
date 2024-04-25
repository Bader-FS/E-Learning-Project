<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Domain;
use App\Models\Prof;
use App\Http\Requests\storeCourseRequest;
use App\Http\Requests\updateCourseRequest;
use Illuminate\Support\Facades\Storage;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['route'] = 'courses'; 
        $data['courses'] = Course::select('id','domain_id','prof_id','name','image','certified','trend')->get(); 
        return view('admin.course.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['route'] = 'courses'; 
        $data['domains'] = Domain::select('id','name')->get();
        $data['profs'] = Prof::select('id','name')->get();
        return view('admin.course.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeCourseRequest $request)
    {
        try {
            $validate = $request->validated();

            $image = $request->file('image')->store('public/assets/uploads/Course');

            $course = new Course();
            $course->domain_id = $request->domain_id;
            $course->prof_id = $request->prof_id;
            $course->name = $request->name;
            $course->slug = $request->slug;
            $course->short_description = $request->short_description;
            $course->description = $request->description;
            $course->certified = $request->certified ? '1' : '0';
            $course->trend = $request->trend ? '1' : '0';
            $course->price = $request->price;
            $course->selling_price = $request->selling_price;
            $course->duration = $request->duration;
            $course->language = $request->language;
            $course->map_keywords = $request->map_keywords;
            $course->image = $image;
            $course->save();

            return redirect()->route('courses.index')->with('success','Successfully saved');
        } 
        catch (\Exception $e) {
            return redirect()->back()->with('error_catch',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $data['route'] = 'courses';
        $data['course'] = $course;
        return view('admin.course.show',$data);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $data['route'] = 'courses'; 
        $data['course'] = $course;
        $data['domains'] = Domain::select('id','name')->get();
        $data['profs'] = Prof::select('id','name')->get();
        return view('admin.course.edit',$data); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateCourseRequest $request,Course $course)
    {
        try {

            $image = $course->image;

            if($request->hasFile('image')){
                Storage::delete($course->image);
                $image = $request->file('image')->store('public/assets/uploads/Course');
            }

            $course->update([
                'domain_id'=> $request->domain_id,
                'prof_id'=> $request->prof_id,
                'name'=> $request->name,
                'slug'=> $request->slug,
                'short_description'=> $request->short_description,
                'description'=> $request->description,
                'certified'=> $request->certified ? '1' : '0',
                'trend'=> $request->trend ? '1' : '0',
                'price'=> $request->price,
                'selling_price'=> $request->selling_price,
                'duration'=> $request->duration,
                'language'=> $request->language,
                'map_keywords'=> $request->map_keywords,
                'image'=> $image,
            ]);

            return redirect()->route('courses.index')->with('success','Successfully Updated');

        } catch (\Exception $e) {
            return redirect()->back()->with('error_catch',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        Storage::delete($course->image);
        $course->delete();
        return redirect()->route('courses.index')->with('success','Deleted Successfully');
    }
}
