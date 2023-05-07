<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Return_;

class ProductAdminService
{
    public function getMenu()
    {
        return Menu::where('parent_id',0)->get();
    }

    protected function isValidPrice($request)
    {
        if ($request->input('price')!= 0 && $request->input('price_sale')!=0
            && $request->input('price_sale') >=$request->input('price')){
            Session::flash('error','Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }
        if ($request->input('price_sale') != 0 && (int)$request->input('price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }
    }
    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;
        // Hai dòng trên để check request
        try{
            $request->except('_token');
            Product::create($request->all());
            Session::flash('success','Thêm sản phẩm thành công');
        }catch (\Exception $err){
            Session::flash('error','Thêm sản phẩm lỗi');
            \Log::info($err->getMessage());
            return false;

        }
        return true;
    }

    public function get()
    {
        return Product::with('menu')
            ->orderByDesc('id')->paginate(15);
    }

    public function update($request,$product)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $product->fill($request-> input());
            $product->save();
            Session::flash('success','Cập nhật thành công');
        }catch (\Exception $err){
            Session::flash('error','Vui lòng thử lại');
            \Log::info($err->getMessage());
            return false;
        }
        return false;
    }
}
