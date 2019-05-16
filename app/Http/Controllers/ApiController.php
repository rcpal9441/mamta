<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Topping;
use App\ToppingPercentage;
use App\User;
use App\ProductDensity;
use DB;

class ApiController extends Controller
{
    
    public function __construct()
    {
        
    }

    public function productFirms(Request $request)
    {
        $response = ['status'=>false];
        $pid = $request->get('pid');
        // dd($this->getItemById(1));
        // dd($category_id);
        $densities = ProductDensity::where('product_id',$pid)->where('status',1)->orderBy('category_id')->get(); 
        $productdensities = [];
        foreach($densities as $productdensity){
            $category = $this->getItemById(\Config::get('data.firmcategories'),$productdensity->category_id);
            if (!array_key_exists($category, $productdensities)) {
                $productdensities[$category] = [];
            }
            $productdensities[$category][] = $productdensity;
        }
        $items = Topping::where('status',1)->orderBy('item_id')->get();
        $otheritems = [];
        foreach($items as $item){
            $otheritem = $this->getItemById(\Config::get('data.itemitems'),$item->item_id);
            if (!array_key_exists($otheritem, $otheritems)) {
                $otheritems[$otheritem] = [];
            }
            $otheritems[$otheritem][] = $item;
        }

        $data['productdensities'] = $productdensities;
        $data['otheritems'] = $otheritems;
        if($data){
            $response['status'] = true;
            $response['data'] = $data;
        }
        return response()->json($response);
    }

    public function getItemById($array,$id){
        foreach($array as $key => $category){
            if($category['id']==$id){
                return $array[$key]['name'];
            }
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

    public function calculatePrice(Request $request){
        $response = ['status'=>false];
        $data = $request->all();
        $price = [];
        $gst = \Config::get('data.gst');
        $pricefirm = 1;
        if($data['oitem_ids']){
            $data['oitem_ids'] = explode(',', $data['oitem_ids']);
            if(count($data['oitem_ids'])==0){
                $pricerow = ToppingPercentage::where('status',1)->first();
                
                if(count($data['firm_ids'])>0){
                    $pricerow = $pricerow->where('product_density_id',$data['firm_ids']);
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
        }else{  
            $pricerow = ToppingPercentage::where('product_density_id',$data['firm_ids'])->first();
            if($pricerow){
                $pricefirm = $pricerow->Foam_Only;
            }
        }
        $totalprice = ($data['l']*$data['w']*$data['d']*$pricefirm)/144;
        $calGst = ($gst*$totalprice)/100;
        $totalwithGst = $totalprice+$calGst;
        $price['price'] = round($totalprice,2);
        $price['gst'] = round($calGst,2);
        $price['totalprice'] = round($totalwithGst,2);
        $price['overallprice'] = (int)round($totalwithGst,2);
        if($price){
            $response['status'] = true;
            $response['data'] = $price;
        }
        
        return response()->json($response);
    }

public function calculatePriceWithParams($request){
        $response = ['status'=>false];
        $data = (array)$request;
        $price = [];
        $gst = \Config::get('data.gst');
        $pricefirm = 1;
        if($data['oitem_ids']){
            $data['oitem_ids'] = explode(',', $data['oitem_ids']);
            if(count($data['oitem_ids'])==0){
                $pricerow = ToppingPercentage::where('status',1)->first();
                
                if(count($data['firm_ids'])>0){
                    $pricerow = $pricerow->where('product_density_id',$data['firm_ids']);
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
        }else{  
            $pricerow = ToppingPercentage::where('product_density_id',$data['firm_ids'])->first();
            if($pricerow){
                $pricefirm = $pricerow->Foam_Only;
            }
        }
        $totalprice = ($data['l']*$data['w']*$data['d']*$pricefirm)/144;
        $calGst = ($gst*$totalprice)/100;
        $totalwithGst = $totalprice+$calGst;
        $price['price'] = round($totalprice,2);
        $price['gst'] = round($calGst,2);
        $price['totalprice'] = round($totalwithGst,2);
        $price['overallprice'] = (int)round($totalwithGst,2);
        if($price){
            $response['status'] = true;
            $response['data'] = $price;
        }
        
        return response()->json($response);
    }
}
