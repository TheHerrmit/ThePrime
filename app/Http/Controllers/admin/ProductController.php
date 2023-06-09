<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductAdminService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductAdminService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return view('admin.product.list',[
            'title'=>'Danh sách sản phẩm',
            'products'=>$this->productService->get()
        ]);
    }


    public function create()
    {
        return view('admin.product.add',[
            'title' =>'Thêm sản phẩm',
            'menus'=>$this->productService->getMenu()
        ]);
    }


    public function store(CreateFormRequest $request)
    {
        $result = $this->productService->insert($request);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.edit',[
            'title'=>'Chỉnh sửa sản phẩm',
            'product'=>$product,
            'menus'=>$this->productService->getMenu()
        ]);
    }


    public function update(Request $request,Product $product)
    {
        $this->productService->update($request,$product);
        return redirect()->back();
    }


    public function destroy(Request $request): \Illuminate\Http\JsonResponse
    {
        $result = $this ->productService ->delete($request);
        if($request){
            return response()->json([
               'error'=> false,
                'message'=>'Xoa thanh cong',

            ]);
        }
        return response()->json(['error'=>true]);
    }
}
