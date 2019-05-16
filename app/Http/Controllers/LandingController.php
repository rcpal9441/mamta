<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Topping;
use App\User;
use DB;
use App\ProductDensity;
use App\ToppingPercentage;

class LandingController extends Controller
{
    
    public function __construct()
    {
        
    }

    public function index()
    {
        $data = [];
        $user = User::get();
        $shapes   = \Config::get('data.shapes');
        foreach ($shapes as $key => $shape) {
            $shapes[$key]['thumbnail'] = \URL::to('/public/assets/images/icon/'.$shape["thumbnail"]);
        }

        $featured_products = Product::where('status',1)->get();
        $toppings = Topping::where('status',1)->get();
        $data['featured_products'] = $featured_products;
        $data['toppings'] = $toppings;

        return view('frontend.indexpage.index',compact('data','shapes'));
    }

    public function shapefullView(Request $request,$slug){
        $shapes   = \Config::get('data.shapes');
        $data = $request->all();
        $shapeDetails = [];
        $shapeDetails['image'] = '';
        $shapeDetails['name'] = '';
        $shapeDetails['slug'] = '';
        foreach ($shapes as $key => $shape) {
            $shapes[$key]['thumbnail'] = \URL::to('/public/assets/images/icon/'.$shape["thumbnail"]);
            if($shape['slug']==$slug){
                $shapeDetails = $shape;
            }
        }
        //dd($shapeDetails);
        $shapeDetails['image'] = \URL::to('/public/assets/images/'.$shapeDetails["image"]);
        //dd($shapeDetails['image']);
        $products = Product::where('status',1)->with('densities')->get();
            $oitem_ids = [];
            if(isset($data['oitem_ids']) && $data['oitem_ids']!=null){
                $oitem_ids = explode(',', $data['oitem_ids']);
            }
            $data['oitem_ids'] = $oitem_ids;
            $firm_ids = [];
            if(isset($data['firm_ids']) && $data['firm_ids']!=null){
                $firm_ids = explode(',', $data['firm_ids']);
            }
            $data['firm_ids'] = $firm_ids;
            $price = $this->calculatePrice($data);
            return view('frontend.shapes.detail',compact('shapeDetails','shapes','data','products','price'));
    }

    public function calculatePrice($data){
        $price = [];
        $price['price'] = 0;
        $price['gst'] = 0;
        $price['totalprice'] = 0;
        $price['overallprice'] = 0;
        $gst = $totalprice = 0;
        if(isset($data['l']) && isset($data['w']) && isset($data['d'])){
        $gst = \Config::get('data.gst');
        $pricefirm = 1;
        if(count($data['oitem_ids'])==0){
            $pricerow = ToppingPercentage::whereIn('product_density_id',$data['firm_ids'])->first();
            if($pricerow){
                $pricefirm = $pricerow->Foam_Only;
            }
        }else{
            $pricerow = ToppingPercentage::where('status','1')->first();

            if(count($data['firm_ids'])>0){
                $pricerow = $pricerow->whereIn('product_density_id',$data['firm_ids']);
            }
            $pricerow = $pricerow->first();
            if(in_array(1,$data['oitem_ids'])){
                $pricefirm += $pricerow->Polycover;
            }
            if(in_array(2,$data['oitem_ids'])){
                $pricefirm += $pricerow->Quilting;
            }
            if(in_array(3,$data['oitem_ids'])){
                $pricefirm += $pricerow->Wool;
            }
            if(in_array(4,$data['oitem_ids'])){
                $pricefirm += $pricerow->Vinyle;
            }
            if(in_array(5,$data['oitem_ids'])){
                $pricefirm += $pricerow->Cotton;
            }
            if(in_array(6,$data['oitem_ids'])){
                $pricefirm += $pricerow->Silk_Fill;
            }
            if(in_array(7,$data['oitem_ids'])){
                $pricefirm += $pricerow->Cotton;
            }
            if(in_array(8,$data['oitem_ids'])){
                $pricefirm += $pricerow->Wool;
            }

        }

        $totalprice = ($data['l']*$data['w']*$data['d']*$pricefirm)/144;
        }
        $calGst = ($gst*$totalprice)/100;
        $totalwithGst = $totalprice+$calGst;
        $price['price'] = round($totalprice,2);
        $price['gst'] = round($calGst,2);
        $price['totalprice'] = round($totalwithGst,2);
        $price['overallprice'] = (int)round($totalwithGst,2);
        return $price;
    }

}
