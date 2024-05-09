<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\Course;

class websiteController extends Controller
{
    public function index(){
        $data['route'] = 'index_page';
        $data['domains'] = Domain::where('is_popular',1)->select('id','name','description','image','slug')->get();
        $data['courses'] = Course::where('trend',1)->select('id','name','short_description','image','price','slug','selling_price','duration','domain_id')->get();
        return view('website.index',$data);
    }

    public function getDomains(){
        $data['route'] = 'domains_page';
        $data['domains'] = Domain::where('is_active',1)->paginate(12);
        return view('website.domains',$data);
    }

    public function getCourses(){
        $data['route'] = 'courses_page';
        $data['courses'] = Course::paginate(12);
        return view('website.courses',$data);
    }

    public function getDomainBySlug($slug){

        if (Domain::where('slug',$slug)->exists()){
            $data['route']='domains_page';
            $data['domain'] = Domain::with('courses')->where('slug',$slug)->where('is_active',1)->first();
            return view('website.domain',$data);

        }else{
            return redirect('/')->with('error','there is Wrong slug!');
        }
    }

    public function getCourseBySlug($domain_course ,$course_domain){
        if (Domain::where('slug',$domain_course)->exists()){
            if (Course::where('slug',$course_domain)->exists()){
                $data['route']='domains_page';
                $data['course'] = Course::with('domain')->where('slug',$course_domain)->first();
                $data['technologies'] = explode(',', $data['course']->map_keywords);

                return view('website.course',$data);

            }else{
                return redirect('/')->with('error','there is No Course!');
            }
        }else{
            return redirect('/')->with('error','there is No Domain!');
        }
    }
}
