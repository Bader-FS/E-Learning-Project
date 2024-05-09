<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ErrorException;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;



class PaymentController extends Controller
{
    //

    public function index(Course $course){
        $route = 'courses_page';

        session()->put('order',[
            'course_id' => $course->id,
            'qty' => 1,
            'total' => $course->selling_price 
        ]);
        

        return view('website.payments.index')->with([
            'course' => $course,
            'route' => $route
        ]);
    }


    public function pay(){

        \Stripe\Stripe::setApiKey('sk_test_51Oo1plJ3MIokhj73moFma8hrcEJJvsbDkw5jSq9sEsn2BeouHM7jEH99sOmqnKjVQRiAoWB9oGnTI2ic4Bnt6IgZ00sqJNTaXd');

        try {
            $jsonStr = file_get_contents('php://input');
            $jsonObj = json_decode($jsonStr);

            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $this->calculateOrderAmount($jsonObj->items),
                'currency' => 'usd',
                'description' => 'Training Edge Consulting',
                'setup_future_usage' => 'on_session',
                'metadata' => [
                    'user_id' => auth()->user()->id
                ]
            ]);

            $output = [
                'clientSecret' => $paymentIntent->client_secret
            ];

            return response()->json($output);

        } catch (ErrorException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function calculateOrderAmount(array $items)
    {
        foreach ($items as $item) {
            //to get Amount by Dollar we multiple in 100:
            return $item->amount * 100;
        }
        
    }

    public function success()
    {
        $order = session()->get('order');
        Auth::user()->orders()->create($order);
        session()->remove('order');
        return redirect('/')->with([
            'success' => 'Payment placed successfully,Our Office will Call you As soun as Possible!',
            'order' => $order['course_id']
        ]);
    }
}
