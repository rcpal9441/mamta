<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Product;
use App\Topping;

class ToppingController extends Controller
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
        $toppings = Topping::get();
        
        return view('items.toppings.index',compact('toppings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.toppings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('id','name','full_name','description','status');
        $validator = Validator::make($data,Topping::$rules,Topping::$messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try{
           $topingObj = new Topping();
           $updateStatus = $topingObj->createTopping($data); 
           return \Redirect::route('toppings.index')->with('success', 'Topping successfully updated');
        }catch(Exception $e) {
          return back()->with('error', $e->getMessage());
        }
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

        $topping = Topping::find($id);

        return view('items.toppings.edit',compact('topping'));
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
        
        $data = $request->only('id','name','full_name','description','status');
        $validator = Validator::make($data,Topping::$rules,Topping::$messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $topingObj = new Topping();
        $updateStatus = $topingObj->updateTopping($data);
        if($updateStatus){
            return \Redirect::route('toppings.index')->with('success', 'Topping successfully updated');
        }
        return back()->with('error', 'Something went wrong!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $deletedStatus = Topping::where('id',$id)->delete();
        if($deletedStatus){
            return \Redirect::route('toppings.index')->with('success', 'Topping successfully deleted');
        }
    }
}
