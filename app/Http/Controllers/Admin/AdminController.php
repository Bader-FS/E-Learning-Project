<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\User;
use App\Models\Prof;
use App\Models\Course;
use App\Models\Order;


class AdminController extends Controller
{
    public function index(){
        $data['route'] = 'dashboard';
        $data['totalDomains'] = Domain::all()->count();
        $data['totalCourses'] = Course::all()->count();
        $data['totalOrders'] = Order::all()->count();
        $data['totalUsers'] = User::all()->count();
        $data['totalProfs'] = Prof::all()->count();
        return view('admin.dashboard',$data);

        //$totalDepartements = Departement::all()->count();
        //$totalEmployers = Employer::all()->count();
        //$totalAdministrateurs = User::all()->count();
    }
}
