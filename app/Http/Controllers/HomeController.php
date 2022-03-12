<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{
     public function index()
    {
   
        
        $data=[];
     
        return view('welcome',compact('data'));
    }
     public function show(Request $request)
    {
        $request->validate([
            'from'=>'required',
            'to'=>'required',
            'day'=>'required',
        ]);

        $from = $request->input('from');
        // return $from;
        $to = $request->input('to');
    //  $t=  date('Y-m-d', strtotime('now'));
    //   return $timestamp = strtotime($t);
        $day = $request->input('day');

       
        
        $orders=  DB::table('orders')
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->join('merchants', 'products.merchant_id', '=', 'merchants.id')
        ->whereBetween('orders.created_at', [$from, $to])
        ->select('products.name','orders.created_at','merchants.merchant_name','products.price' )
        ->orderBy('orders.created_at', 'asc')
        ->get();
        // return $orders;
        $data=[];
        foreach ($orders as $order) {
           if (Carbon::parse( $order->created_at)->format('l') ==$day ) {
            array_push($data, $order);
           }
        }
        // return $data;
        return view('welcome',compact('data','from','to','day'));

    }
    //  public function show()
    // {
    //     return ['name' =>'ali'];
    // }
}
