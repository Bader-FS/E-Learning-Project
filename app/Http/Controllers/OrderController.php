<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;



class OrderController extends Controller
{
    public function index(){
        $data['route'] = 'order_page';
        $data['user'] = User::where('id',Auth::id())->first();
        $data['orders'] = Order::where('user_id',Auth::id())->get();
        $data['count_orders'] = Order::where('user_id',Auth::id())->count();
        return view('website.order.index',$data);
    }
}
