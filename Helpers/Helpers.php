<?php
/**
 * Created by PhpStorm.
 * User: liang
 * Date: 2017/2/19
 * Time: 21:05
 */

/**
 * 对栏目返回的多维数组按照一定格式递归遍历出来
 * @param array
 *
 * @return arraydatas
 */

function Recursivestypeinfos2($arr){

     if(!is_array($arr)){

         echo " <li><a class=\"arctype\" href=\"/admin/category/edit/{$arr->term_id}\"><i class=\"fa fa-envelope-o\"></i> {$arr->name}[ID:{$arr->term_id}] </a>
                              
                                
                                <div class=\"modal fade modal-sm{$arr->term_id}\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"mySmallModalLabel\">
                            <div class=\"modal-dialog modal-sm modal-s-m{$arr->term_id} \" role=\"document\">
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>
                                        <h5 class=\"modal-title\" id=\"mySmallModalLabel\">是否要删除栏目</h5>
                                    </div>
                                    <div class=\"modal-body\">
                                        {$arr->taxonomy}
                                    </div>
                                    <div class=\"modal-footer\">
                                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">返回</button>
                                        <button type=\"button\" class=\"btn btn-primary\" id='btn-{$arr->term_id}' onclick=\"AjDelete({$arr->term_id},'modal-s-m{$arr->term_id}')\">删除</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class=\"label label-primary pull-right\" onclick=\"link('','admin/admin/article/infos?term_id={$arr->term_id}')\">内容</span>
                                 <span class=\"label label-success pull-right\" onclick=\"link({$arr->term_id},'admin/category/edit')\">编辑栏目</span> ";


     }
     else{
        return false;
     }
}


function Recursivestypeinfos($arr){


    if(!is_array($arr)){

        return false;
    }else{
        foreach ($arr as $key=>$value)
        {

            if(isset($value['list']))
            {
                //dd($value);
                echo " <li><a class=\"arctype\" href=\"/admin/article/type/{$key}\"><i class=\"fa fa-envelope-o\"></i> {$value['list']}</a>
                                <span class=\"label label-primary pull-right\">".\App\AdminModel\Archive::where('typeid',$key)->count()."</span>
                                <span class=\"label label-danger pull-right\" data-toggle=\"modal\" data-target=\".modal-sm{$key}\">删除</span>
                                <div class=\"modal fade modal-sm{$key}\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"mySmallModalLabel\">
                            <div class=\"modal-dialog modal-s-m{$key} modal-sm\" role=\"document\">
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>
                                        <h5 class=\"modal-title\" id=\"mySmallModalLabel\">是否要删除栏目</h5>
                                    </div>
                                    <div class=\"modal-body\">
                                        {$value['list']}
                                    </div>
                                    <div class=\"modal-footer\">
                                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">返回</button>
                                        <button type=\"button\" class=\"btn btn-primary\" id='btn-{$key}'  onclick=\"AjDelete({$key},'modal-s-m{$key}')\">删除</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                                 <span class=\"label label-success pull-right\" onclick=\"link({$key},'admin/category/edit')\">编辑</span> 
                                 <span class=\"label label-warning pull-right\" onclick=\"link({$key},'admin/category/create')\">添加子类</span></li>";
                if (isset($value['next']))
                {
                    echo "<div class=\"box box-solid collapsed-box\">
                                                <div class=\"box-header with-border\">
                                                    <h3 class=\"box-title\"><i class='fa fa-long-arrow-down' style='padding-left: 10px;'>{$value['list']}</i></h3>
    
                                                    <div class=\"box-tools\">
                                                        <button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-plus\"></i></button>
                                                    </div>
                                                </div>
                                                <div class=\"box-body no-padding\">
                                                    <ul class=\"nav nav-pills nav-stacked\">";
                    foreach ($value['next'] as $item=>$items)
                    {
                        if(isset($items['list']))
                        {

                            echo "<li class=\"active\"><a class=\"arctype\" href=\"/admin/article/type/{$item}\"><i class=\"fa fa-inbox\"></i>".$items['list']."</a><span class=\"label label-primary pull-right\">".\App\AdminModel\Archive::where('typeid',$item)->count()."</span>
                            <span class=\"label label-danger pull-right\" data-toggle=\"modal\" data-target=\".modal-sm{$item}\">删除</span>
                            <div class=\"modal fade modal-sm{$item}\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"mySmallModalLabel\">
                            <div class=\"modal-dialog modal-s-m{$item} modal-sm\" role=\"document\">
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>
                                        <h5 class=\"modal-title\" id=\"mySmallModalLabel\">是否要删除栏目</h5>
                                    </div>
                                    <div class=\"modal-body\">
                                        {$items['list']}
                                    </div>
                                    <div class=\"modal-footer\">
                                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">返回</button>
                                        <button type=\"button\" class=\"btn btn-primary\" id='btn-{$item}' onclick=\"AjDelete({$item},'modal-s-m{$item}')\">删除</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                             <span class=\"label label-success pull-right\" onclick=\"link({$item},'admin/category/edit')\">编辑</span> <span class=\"label label-warning pull-right\" onclick=\"link({$item},'admin/category/create')\">添加子类</span></li>";
                            if(isset($items['next'])){

                                Recursivestypeinfos($items['next']);
                            }
                        }else{
                            echo "<li class=\"active\"><a class=\"arctype\" href=\"/admin/article/type/{$item}\"><i class=\"fa fa-inbox\"></i>".$items." </a> <span class=\"label label-primary pull-right\">".\App\AdminModel\Archive::where('typeid',$item)->count()."</span>
                            <span class=\"label label-danger pull-right\" data-toggle=\"modal\" data-target=\".modal-sm$item\">删除</span> 
                            <div class=\"modal fade modal-sm{$item}\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"mySmallModalLabel\">
                            <div class=\"modal-dialog modal-sm modal-s-m{$item} \" role=\"document\">
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>
                                        <h5 class=\"modal-title\" id=\"mySmallModalLabel\">是否要删除栏目</h5>
                                    </div>
                                    <div class=\"modal-body\">
                                        {$items}
                                    </div>
                                    <div class=\"modal-footer\">
                                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">返回</button>
                                        <button type=\"button\" class=\"btn btn-primary\" id='btn-{$item}'  onclick=\"AjDelete({$item},'modal-s-m{$item}')\" >删除</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <span class=\"label label-success pull-right\" onclick=\"link({$item},'admin/category/edit')\">编辑</span> <span class=\"label label-warning pull-right\" onclick=\"link({$item},'admin/category/create')\">添加子类</span></li>";

                        }

                     }
                    echo "</ul>
                                    </div>
                                            </div>";

                }
            }else{

                echo " <li><a class=\"arctype\" href=\"/admin/category/edit/{$key}\"><i class=\"fa fa-envelope-o\"></i> {$value}[ID:{$key}] [".\Common::arctypeMid($key)."]</a>
                                <span class=\"label label-primary pull-right\">".\App\AdminModel\Archive::where('typeid',$value)->count()."</span>
                                <span class=\"label label-danger pull-right\" data-toggle=\"modal\" data-target=\".modal-sm{$key}\">删除</span>
                                <div class=\"modal fade modal-sm{$key}\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"mySmallModalLabel\">
                            <div class=\"modal-dialog modal-sm modal-s-m{$key} \" role=\"document\">
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>
                                        <h5 class=\"modal-title\" id=\"mySmallModalLabel\">是否要删除栏目</h5>
                                    </div>
                                    <div class=\"modal-body\">
                                         {$value}
                                    </div>
                                    <div class=\"modal-footer\">
                                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">返回</button>
                                        <button type=\"button\" class=\"btn btn-primary\" id='btn-{$key}' onclick=\"AjDelete({$key},'modal-s-m{$key}')\">删除</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class=\"label label-primary pull-right\" onclick=\"link('','admin/admin/article/infos?typeid={$key}')\">内容</span>
                                 <span class=\"label label-success pull-right\" onclick=\"link({$key},'admin/category/edit')\">编辑栏目</span> <span class=\"label label-warning pull-right\" onclick=\"link({$key},'admin/category/create')\">添加子类</span></li>";

            }


        }
    }

}



