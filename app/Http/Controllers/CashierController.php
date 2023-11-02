<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Section;
use App\Models\User;
use App\Notifications\MountNotifucation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CashierController extends Controller
{
    public function store(Request $request)
    {

        return $request;
    }
    public function get_products($section_id)
    {

        return response()->json(Section::find($section_id)->products->pluck('id', 'Product_name'));
    }
    public function get_price($product)
    {
        return response()->json(Product::find($product)->selling_price);
    }
    public function store_order(Request $request)
    {

        $order = Order::create([
            'payment_type' => 'cashe',
        ]);

        for ($i = 0; $i <= count($request->products) - 1; $i++) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $request->products[$i],
                'section_id' => $request->sections[$i],
                'mount' => $request->mounts[$i],
                'total' => $request->totals[$i],
                'discount' => $request->discounts[$i],
            ]);



            $product_m = Product::where('id', ($request->products[$i]))->first();


            $product_m->update([

                'mount' => ($product_m->mount) - ($request->mounts[$i])
            ]);
        }

        $products =  Product::wherein('id', $request->products)->get();
        foreach ($products as $product) {


            if ($product->mount <= $product->notification_mount) {


                Notification::send(User::all(), new MountNotifucation(Product::find($product->id)));
            }
        }
        $orderbacks = $order->order_details;

        return view('cashier.cashier', compact('orderbacks'));
    }
}


//     public function store_order(Request $request)
//     {

//         $order = Order::create([
//             'payment_type' => 'cashe',
//         ]);
//         // return  $order;

//         for ($i = 0; $i <= count($request->products) - 1; $i++) {
//             OrderDetail::create([
//                 'order_id' => $order->id,
//                 'product_id' => $request->products[$i],
//                 'section_id' => $request->sections[$i],
//                 'mount' => $request->mounts[$i],
//                 'total' => $request->totals[$i],
//                 'discount' => $request->discounts[$i],
//             ]);


//         }
//         $orderbacks = $order->order_details;

//         // return $orderbacks;


//         return view('cashier.cashier', compact('orderbacks'));
//     }
// }
