<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
// use Carbon\Carbon;
use Illuminate\Support\Carbon;
// use function PHPUnit\Framework\returnSelf;

class DashboardController extends Controller
{


    public function index()
    {
        $orders_count_day = OrderDetail::where('day', date("Y-m-d"))->get()->sum('total');

        $toatal_selling = OrderDetail::where('day', date("Y-m-d"))->get()->sum('total');


        $end_prodcuts = Product::where('mount', 0)->get()->count();

        // $start_end_products_count=Product::where('mount',0)->get()->count();
        $start_end_products_count = 0;

        foreach (Product::all() as $prodcut) {

            if ($prodcut->mount <= $prodcut->notification_mount) {

                $start_end_products_count++;
            }
        }


        // return $toatal_selling->sum('total');
        return view('welcome', compact('orders_count_day', 'end_prodcuts', 'start_end_products_count','toatal_selling'));
    }
}
