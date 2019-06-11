<?php
/**
 * Created by PhpStorm.
 * User: liang
 * Date: 2017/3/15
 * Time: 13:25
 */

namespace App;


use App\AdminModel\Arctype;

class Header
{
    function HeaderLists()
    {
        $typeinfos=Arctype::where('reid',0)->take(9)->pluck('typename','real_path');
        return $typeinfos;
    }
}