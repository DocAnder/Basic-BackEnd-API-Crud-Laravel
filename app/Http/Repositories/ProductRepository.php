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
}