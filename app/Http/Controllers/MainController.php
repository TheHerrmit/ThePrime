<?php

namespace App\Http\Controllers;

use App\Http\Services\Menu\MenuService;
use App\Http\Services\Slider\SliderService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct(SliderService $slider, MenuService $menu,)
    {
        $this->slider = $slider;
        $this->menu = $menu;

    }
    public function index()
    {
        return view('main',[
            'title'=>'Shop Nước Hoa Shen',
            'menus'=> $this->menu->show(),

        ]);
    }
}
