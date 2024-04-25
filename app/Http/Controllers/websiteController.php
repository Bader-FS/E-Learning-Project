<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\Course;

class websiteController extends Controller
{
    public function index(){
        $data['route'] = 'index_page';
        $data['domains'] = Domain::where('is_popular',1)->select('id','name','description','image')->get();
        $data['courses'] = Course::where('trend',1)->select('id','name','short_description','image','price','selling_price','duration')->get();
        return view('website.index',$data);
    }

    public function getDomains(){
        $data['route'] = 'domains_page';
        $data['domains'] = Domain::where('is_active',1)->paginate(12);
        return view('website.domains',$data);
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
}
