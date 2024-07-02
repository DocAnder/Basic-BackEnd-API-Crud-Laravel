<?php

namespace App\Http\Repositories;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository
{

    public function index(){
        return Product::orderBy('id', 'ASC')->get();
    }

    public function show($productId) {
        return Product::find($productId);        
    }

    public function store($newProductData){        
        return Product::create($newProductData);
    }

    public function update($productId, $data){
        // $product = Product::findOrFail($productId);
        // $product->update($data);
        // return $product;
        $productFound = Product::find($productId);
        if($productFound){
            $product->update($data);
            return $product;
        }else {
            return null;
        }
    }

    public function destroy($productId){
        $productFound = Product::find($productId);
        if($productFound){
            $productFound->delete();
            return $productFound;
        }else {
            return null;
        }
    }





    // public function create(array $newProductData)
    // {
    //     return Product::create($newProductData);
    // }

    // public function update($productId, $newData)
    // {
    //     $product = Product::findOrFail($productId);
    //     $product->update($data);
    //     return $product;
    // }


    

    // public function deleteProduct($productId)
    // {
    //     $product = Product::findOrFail($productId);

    //     if ($product->photo) {
    //         Storage::disk('public')->delete($product->photo);
    //     }

    //     $product->delete();

    //     return $product;
    // }

}