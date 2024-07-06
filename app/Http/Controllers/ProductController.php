<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Product;
use App\Http\Services\ProductService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{

    protected $service;

    public function __construct(ProductService $service) {        
        $this->service = $service;
    }

    public function index() : JsonResponse {        
        return response()->json($this->service->index());
    }

    public function show($product) : JsonResponse{

        $productFound = $this->service->show($product);

        if($productFound){
            return response()->json($productFound);            
        }else {
            return response()->json([
                'status'=> false,
                'id sent'=> $product,
                'message'=> 'Product not found',
            ], 404);
        }        
    }

    public function store(Request $request) : JsonResponse{
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:40',
            'description' => 'required|max:255',
            'price' => 'required',
            'image' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=> 'Validation error!',
                'erros'=> $validator->errors(),
            ], 422);
        }       

        $validated = $request->validate([
            'name' => 'required|max:40',
            'description' => 'required|max:255',
            'price' => 'required|max:255',
            'image' => 'nullable',
        ]);
        //Retirado : && $request->hasFile('image') != null -> teste no front depois
        if ($request->hasFile('image') ) {         
            $validated['image'] = $this->service->storeProductImage(
                $request->file('image')
            );
        }

        return response()->json($this->service->store($validated));
    }

    public function update(Request $request, $id){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:40',
            'description' => 'required|max:255',
            'price' => 'required',
            'image' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=> 'Validation error!',
                'erros'=> $validator->errors(),
            ], 422);
        }       

        $validated = $request->validate([
            'name' => 'required|max:40',
            'description' => 'required|max:255',
            'price' => 'required|max:255',
            'image' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $this->service->storeProductImage(
                $request->file('image')
            );
        }        
        
        $productUpdated = $this->service->update($validated, $id);

        if ($productUpdated){
            return response()->json($productUpdated);    
        }else {
            return response()->json([
                'status'=> false,
                'message'=> 'Could not found a product to update',
                'id sent'=> $id,
            ], 404);
        }        
    }

    public function destroy($productId){

        $deletedProduct = $this->service->destroy($productId);

        if($deletedProduct){
            return response()->json([], 204);
        }else {
            return response()->json([
                'status'=> false,
                'id sent'=> $productId,
                'message'=> 'Product not found',
            ], 404);
        }

    }
}
