<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;

class ProductAdminService
{
    public function getMenu()
    {
        return Menu::where('parent_id',0)->get();
    }
    public function create($request)
    {
        try{
            Product::create([
                'name' =>(string) $request->input('name'),
                'menu_id' =>(string) $request->input('menu_id'),
                'description' =>(string) $request->input('description'),
                'content' =>(string) $request->input('content'),
                'price' =>(integer) $request->input('price'),
                'price_sale' =>(integer) $request->input('price_sale'),
                'active' =>(string) $request->input('active'),
                'thumb' =>$request->input('content')

            ]);
            Session()->flash('success','Thêm sản phẩm thành công');
        }catch (\Exception $err){
            Session()->flash('error',$err->getMessage());
            return false;

        }
        return true;
    }
}
