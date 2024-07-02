<?php

namespace App\Http\Services;
use App\Http\Repositories\ProductRepository;

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
        return $this->repository->show($product);
    }

    public function store(array $data){
        return $this->repository->store($data);
    }

    public function update(array $data, $productId){
        return $this->repository->update($productId, $data);
    }

    public function destroy($productId){
        return $this->repository->destroy($productId);
    }
}