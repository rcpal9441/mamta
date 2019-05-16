<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductDensity;
use App\ProductToppingPrice;
use App\Topping;
use App\ToppingPercentage;
use Validator;

class PriceCalculatorController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = ToppingPercentage::join('products','products.id','topping_percentage.product_id')
        ->join('product_densities','product_densities.id','topping_percentage.product_density_id')
        ->get(['topping_percentage.*','products.id as product_id','products.name as product_name','product_densities.name as density_name','product_densities.id as product_density_id']);
        return view('items.pricing.index',compact('products'));
    }
    // public function index()
    // {
    //     $products = ProductDensity::join('products','products.id','product_densities.product_id')->get(['products.id as product_id','products.name as product_name','product_densities.name as density_name','product_densities.id as product_density_id']);
    //     //dd($products);
    //     $toppings = Topping::get();
    //     //dd($products);

    //     $pricings = ProductToppingPrice::leftjoin('toppings','toppings.id','product_topping_price.topping_id')->get(['product_topping_price.*','toppings.name as topping_name']);
        
    //     dd($pricings);
        
    //     return view('items.pricing.index',compact('products','pricings','toppings'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('status',1)->get();
        $densities = ProductDensity::where('status',1)->get();
        $toppings = Topping::where('status',1)->get();
        $product = '';
        return view('items.pricing.create',compact('product','products','densities','toppings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->all();

        $validator = Validator::make($data,ToppingPercentage::$rules,ToppingPercentage::$messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $data['status'] = 1;
         try{
            $topingper = ToppingPercentage::create($data);
            return \Redirect::route('pricing.index')->with('success', 'Price successfully added');
         }catch(Exception $e) {
          return back()->with('error', $e->getMessage());
        }
    }

    public function getProductDensity(Request $request){
        $response = ['status'=>false];
        $product_id = $request->get('product_id');
        $densities = ProductDensity::where('product_id',$product_id)->get(['id','name']);
        if(count($densities)>0){
            $response['status'] = true;
            $response['data'] = $densities;
        }

         return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $products = Product::where('status',1)->get();
        $densities = ProductDensity::where('status',1)->get();
        $toppings = Topping::where('status',1)->get();
        $topingperdetail = ToppingPercentage::where('id',$id)->first();
        return view('items.pricing.edit',compact('topingperdetail','products','densities','toppings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $data = $request->all();
        
        $validator = Validator::make($data,ToppingPercentage::$rules,ToppingPercentage::$messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        unset($data['_token']);
       try{
            $topingper = ToppingPercentage::where('id',$data['id'])->update($data);
            return \Redirect::route('pricing.index')->with('success', 'Price successfully updated');
         }catch(Exception $e) {
          return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {   
        try{
            $deletedStatus = ToppingPercentage::where('id',$id)->delete();
            return \Redirect::route('pricing.index')->with('success', 'Price successfully updated');
        }catch(Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
