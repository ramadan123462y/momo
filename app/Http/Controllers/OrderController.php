<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        return view('cashier.order', compact('orders'));
    }


    public function delete($id)
    {


        Order::find($id)->delete();
        return redirect()->back();
    }


    public function arshefed()
    {

        $orders = Order::onlyTrashed()->get();
        return view('cashier.deleted.order', compact('orders'));
    }

    public function force_deleted($id)
    {

        Order::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
        Order::onlyTrashed()->find($id)->restore();
        return redirect()->back();
    }





    public function force_deleted_all()
    {

        Order::onlyTrashed()->forceDelete();
        return redirect()->back();
    }
    public function delete_all()
    {
        $orders = Order::all();

        foreach ($orders as $order) {


            $order->delete();
        }
        return redirect()->back();
    }








    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
