<?php

namespace App\Http\Services;
use App\Http\Repositories\ProductRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(){
        return $this->repository->index();
    }

    public function show($product){        
        $productFound = $this->repository->show($product);                
        if($productFound->image){                        
            $imageUrl = Storage::url($productFound->image);
            $productFound->image = url($imageUrl);
        }
        return $productFound;
    }

    public function store(array $data){       
        return $this->repository->store($data);
    }

    public function storeProductImage(UploadedFile $image) {
        $imageName = $image->getClientOriginalName();
        return $image->storeAs('images', $imageName, 'public');
    }

    public function update(array $data, $productId){
        return $this->repository->update($productId, $data);
    }

    public function destroy($productId){
        return $this->repository->destroy($productId);
    }
}