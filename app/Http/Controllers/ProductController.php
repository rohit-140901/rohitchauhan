<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        $data=Product::all();
        return view('list',compact('data'));
    }
    

    public function create()
    {
        return view('create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg', 
            'price' => 'required'
        ]);

        $data = new Product;
        $data->name = $request->input('name');
        $data->price = $request->input('price');
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
            $data->image = 'images/' . $imageName;
        }
        
        $data->save();
        
        return redirect()->back()->with('success', "Product Aided Successfully.....?");
  
    }

  

    public function edit($id)
    {
        $data=Product::find($id);
        return view('edit',compact('data'));
    }



    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg', 
            'price' => 'required'
        ]);

        $data =  Product::find($request->input('id'));
        $data->name = $request->input('name');
        $data->price = $request->input('price');
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
            $data->image = 'images/' . $imageName;
        }
        
        $data->save();
        
        return redirect()->back()->with('success', "Product Updated Successfully.....?");
    
    }


    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back()->with('fail',"Product Deleted Successfully.....?");
    }


    public function filter(Request $request)
    {
      $start_date=$request->start_date;
      $end_date=$request->end_date;
      $data=Product::whereDate('created_at','>=',$start_date)
                    ->whereDate('created_at','<=', $end_date)->get();
                   return view('list',compact('data'));
    }
    
}