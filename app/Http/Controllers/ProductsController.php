<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use Auth;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Products::paginate(10);
        $data['products']=$products;
        //dd($data);
        return view('products.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('products.create',['product'=>'']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=[
         'name'=>'required',
         'title'=>'required',
         'description'=>'required',
         //'type'=>'required',
         'price'=>'required|numeric|between:0,99.99',
         'status'=>'required',
         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $msg=['name.requierd'=>'Product Name is requierd',
         'price'=>'Price is numeric and decimal value allowed'
        ];
        $request->validate($post,$msg);

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('admin/images/'), $imageName);
        $imageName='public/admin/images/'.$imageName;

        $products=new Products;
        $products->name=$request->name;
        $products->title=$request->title;
        $products->description=$request->description;
        $products->sub_description=$request->sub_description;
       // $products->type=$request->type;
        $products->price=$request->price;
        $products->user_id=Auth::user()->id;
        $products->image=$imageName;
        $products->status=$request->status;
        $products->save();
        //dump($request);
        return back()->with('success', 'Product created successfully.');
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
        $data['product']=Products::find($id);
        return view('products.create',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=[
         'name'=>'required',
         'title'=>'required',
         'description'=>'required',
        // 'type'=>'required',
         'price'=>'required|numeric|between:0,99.99',
         'status'=>'required',
         // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        if($request->hasFile('image')){
           $post['image'] ='required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }
        $msg=['name.requierd'=>'Product Name is requierd',
         'price'=>'Price is numeric and decimal value allowed'
        ];
        $request->validate($post,$msg);
        $products=Products::find($id);

        if($request->hasFile('image')){
           $imageName = time().'.'.$request->image->getClientOriginalExtension();
           $request->image->move(public_path('admin/images/'), $imageName);
           $imageName='public/admin/images/'.$imageName;
        }else{
           $imageName=$products->image;
        }
        

        
        $products->name=$request->name;
        $products->title=$request->title;
        $products->description=$request->description;
        $products->sub_description=$request->sub_description;
        //$products->type=$request->type;
        $products->price=$request->price;
        $products->image=$imageName;
        $products->status=$request->status;
        $products->save();
        //dump($request);
        return back()->with('success', 'Product created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
