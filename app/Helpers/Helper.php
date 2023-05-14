<?php

namespace App\Helpers;
use Illuminate\Support\Str;
class Helper
{
    public static function menu($menus, $parent_id=0,$char = '')
    {
        $html = '';

        foreach ($menus as $key=>$menu){
            if($menu->parent_id == $parent_id){
                $html .='
                    <tr>
                <td>'. $menu->id .'</td>
                <td>'.$char. $menu->name .'</td>
                <td>'. self::active($menu->active).'</td>
                <td>'. $menu->updated_at .'</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/menus/edit/' . $menu->id . '">
                        <i class="fas fa-edit"></i>
                     </a>
                    <a class="btn btn-danger btn-sm" href="#"
                    onclick="removeRow('. $menu->id .', \'/admin/menus/destroy\')">
                            <i class="fas fa-trash"></i>
                    </a>
                </td>
                    </tr>
                ';
                unset($menus[$key]); //function xóa của php xóa menu tổng
                $html .= self::menu($menus,$menu->id,$char.'|-- ');
            }
        }
        return $html;
    }
        public static function active( $active = 0): string
        {
        return $active == 0 ? '<span class="btn-xs btn btn-danger">NO</span>':'<span class="btn-xs btn btn-success">YES</span>';

        }

        public static function menus($menus,$parent_id = 0)
        {
            $html = '';
            foreach ($menus as $key => $menu) {
                if ($menu->parent_id == $parent_id) {
                    $html .= '
                    <li>
                        <a href="/danh-muc/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html">
                            ' . $menu->name . '
                        </a>
                         </li>';

                }
            }
            return $html;
        }
}
