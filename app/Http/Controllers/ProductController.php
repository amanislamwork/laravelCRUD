<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Validator;

class ProductController extends Controller
{
    public function __construct() 
    {
      $this->middleware('auth');
      
    }

    public function index(Request $request)
    {
        $input = $request->all();
         
        $query = Product::with('user')->orderBy('id','desc')->where('user_id', \Auth::user()->id);


        if(!empty($input['search'])){
          
            $query->where('name', 'LIKE', '%'.$input['search'].'%')
            ->orWhere('description', 'LIKE', '%'.$input['search'].'%');
        }
        $products  = $query->get();
         
        return view('products.index',['products' => $products]);


    }
     

     public function create()
    {
        return view('products.create');
    }

      public function store(Request $request)
    {
      $input = $request->all();

        $input['user_id'] = \Auth::user()->id;
        $rules = Product::$rules;
        
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $newProduct = Product::create($input);

        return redirect(route('product.index'));

    }

     public function edit($id){
        $product = Product::findorFail($id);
        return view('products.edit', ['product' => $product]);
     }

       public function update($id, Request $request){
        $product = Product::findorFail($id);
        $input = $request->all();
        $rules = Product::$rules;
      
        $rules['name'] .= ','.$product->id; 
        
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product->update($input);

        return redirect(route('product.index'))->with('success', 'Product updated successfully!');
     }

     public function destroy($id){
      $product = Product::findorFail($id);
      $product->delete();
      return redirect(route('product.index'))->with('success', 'Product deleted successfully!');
      
   }
   public function show($id){
    $product = Product::findorFail($id);
    return view('products.view', ['product' => $product]);
   }
}