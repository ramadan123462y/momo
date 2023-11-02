<?php

namespace App\Http\Controllers;

use App\Models\Unite;
use Illuminate\Http\Request;

class UniteController extends Controller
{

    public function index()
    {
        $unites =  Unite::all();
        return view('unites.index', compact('unites'));
    }


    public function store(Request $request)
    {
        try {

            Unite::create([


                'name_unite' => $request->name_unite
            ]);
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {



            Unite::find($id)->delete();
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
    }
}
