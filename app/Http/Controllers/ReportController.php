<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {


        return view('reports.invoices_reports');
    }

    public function report(Request $request)
    {


        $details =  DB::table('products')->where('Product_name', 'like', '%' . $request->product_name . '%')->get();
        return view('reports.invoices_reports', compact('details'));
    }
}
