<?php

namespace App\Http\Repositories;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            if($productFound->image && $data['image']){
                $imageToDelete = $productFound->image;
                $filePath = 'public/' . $imageToDelete;                
                $this->deleteImage($filePath);
            }
            $productFound->update($data);
            return $productFound;
        }else {
            return null;
        }
    }

    public function deleteImage($filePath){        
        if(Storage::exists($filePath)){
            Storage::delete($filePath);
        }        
    }

    public function destroy($productId){
        $productFound = Product::find($productId);
        if($productFound){
            if($productFound->image){
                $filePath = 'public/' . $productFound->image;
                $this->deleteImage($filePath);
            }
            $productFound->delete();
            return $productFound;
        }else {
            return null;
        }
    }
}