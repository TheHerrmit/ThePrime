<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateFormRequest;
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
        //
    }


    public function create()
    {
        return view('admin.product.add',[
            'title' =>'Thêm sản phẩm',
            'products'=>$this->productService->getMenu()
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
