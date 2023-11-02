<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Requests\PruductRequest;
use App\Models\Unite;
use App\Notifications\ProductNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::get();
        // $products = Product::paginate(5);
        $sections = Section::get();
        $unites = Unite::all();

        return view('Product.products', compact('sections', 'products', 'unites'));
    }

    public function store_product(PruductRequest $request)
    {
        $product =   Product::create([
            'Product_name'=>$request->Product_name,
            'trade_Name'=>$request->trade_Name,
            'description'=>$request->description,
            'purchasing_price'=>$request->purchasing_price,
            'selling_price'=>$request->selling_price,
            'mount'=>$request->mount,
            'notification_mount'=>$request->notification_mount,
            'unite_id'=>$request->unite_id,
            'section_id'=>$request->section_id,
            'place'=>$request->place,
        ]);

        return redirect()->back()->with('msg_product_s', "تم اضافه المنتج بنجاح");
    }
    public function update_product(PruductRequest $request)
    {


        Product::find($request->pro_id)->update([
            'Product_name' => $request->Product_name,
            'description' => $request->description,
            'section_id' => $request->section_id,
        ]);
        return redirect()->back()->with('msg_product_s', "تم تعديل المنتج بنجاح");
    }
    public function product_delete(Request $request)
    {


        Product::find($request->pro_id)->delete();
        return redirect()->back()->with('msg_product_s', "تم حذف المنتج بنجاح");
    }
}
