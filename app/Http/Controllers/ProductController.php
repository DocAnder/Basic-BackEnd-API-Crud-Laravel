<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Exception;

class ProductController extends Controller
{
    
    public function index() : JsonResponse {
        $products = Product::orderBy('id', 'ASC')->get();
        return response()->json($products);
    }

    public function show(Product $product) : JsonResponse{
        return response()->json($product);
    }


    public function store(Request $request) : JsonResponse{
        DB::beginTransaction();
        try {
            $product = Product::create([
                'name'=> $request->name,
                'description'=>$request->description,
                'price'=>$request->price,
                'image'=>$request->image,
            ]);
            DB::commit();
            return response()->json($product);

        } catch (Exception $th) {
            DB::rollback();
            return response()->json([
                'status'=> false,
                'message'=> 'Unable to save product.' ], 400);
        }
    }


    public function update(Request $product, $id){
        $productFound = Product::find($id);

        if(!$productFound){
            return response()->json([
                'status'=> false,
                'message' => 'Product not found'], 404);
        }else {
            $newProductData = [
                'name'=> $product->name,
                'description'=>$product->description,
                'price'=>$product->price,
                'image'=>$product->image,
            ];

            $productFound->update($newProductData);
            return response()->json($productFound);
        }

        
    }

}
