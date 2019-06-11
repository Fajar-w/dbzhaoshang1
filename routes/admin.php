<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'admin'],function ()
{
Route::get('login---/===', 'LoginController@showLoginForm')->name('admin.login');
Route::post('login---/===', 'LoginController@login');
Route::get('logout', 'LoginController@logout');

 /**需要登录认证模块**/
    Route::middleware(['auth:admin','rbac'])->group(function (){

    	Route::get('ajax/mjiansuoxm', 'ArticleController@ajaxSearchXm');
		Route::get('dash', 'DashboardController@index');
		Route::get('index','IndexController@index');
		Route::post('upload/images','ImageUploadController@ImagesUpload');
		Route::post('upload/articleimages','ImageUploadController@upload_image');
		Route::post('file-delete-batch','ImageUploadController@DeletePics');
		//栏目
		Route::get('category','CategoryController@Index');
		Route::get('category/create/{id?}','CategoryController@Create');
		Route::get('category/edit/{id}','CategoryController@Edit');
		Route::post('category/create','CategoryController@PostCreate')->name('category_create');
		Route::put('category/edit/{termid}','CategoryController@PostEdit')->name('category_edit');
		Route::post('category/delete/{id}','CategoryController@DeleteCategory');

		Route::post('article/uploads','ArticleController@UploadImages');//图集
		Route::post('article/titlecheck','ArticleController@ArticletitleCheck');
		Route::put('article/edit/{id}','ArticleController@PostEdit')->name('article_edit');

		//项目
		Route::get('article/keywords/create{id}','ArticleController@KeywordsCreate');
		Route::post('article/keywords/create{id}','ArticleController@PostKeywordsCreate');

		Route::get('article/keywords','ArticleController@Keywords')->name('news_list');
		Route::get('article/keywords/delete/{id}/{id2}','ArticleController@KeywordsDelete');
		Route::get('article/keywords/edit/{id}/{id2}','ArticleController@KeywordsEdit');
		Route::post('article/keywords/edit/{id}/{id2}','ArticleController@KeywordsPost')->name('keyarticle_edit');
		Route::post('article/keywords/fenpei{id2}','ArticleController@KeywordsFenpei');
		Route::get('article/keywords/show/{id}','ArticleController@KeywordsShow');
		// Route::post('article/titlecheck','ArticleController@PosttitleCheck');
		//项目文章
		Route::get('pnews/index','ArticleController@pindex')->name('pnewslist');
		Route::get('pnews/create','ArticleController@PnewsCreate');
		Route::post('pnews/create','ArticleController@PostPnewsCreate');
		Route::get('pnews/edit/{id}','ArticleController@PnewsEdit');
		Route::post('pnews/edit/{id}','ArticleController@PostPnewsEdit')->name('pnes_edit');


		//属性
		// Route::get('admin/attribute','AttributeController@Index');
		// Route::get('admin/attribute/create','AttributeController@create');
		// Route::post('admin/attribute/create','AttributeController@PostCreater');

		//用户
		Route::get('admin/list','AdminController@Index');
		Route::get('admin/regsiter','AdminController@Register');
		Route::post('admin/regsiter','AdminController@PostRegister');
		Route::get('admin/edit/{id}','AdminController@Edit');
		Route::get('admin/delete/{id}','AdminController@delete');
		Route::put('admin/edit/{id}','AdminController@PostEdit');
		//操作日志
		// Route::get('actions','ActionLogsController@index');  
		// Route::get('actions/{id}','ActionLogsController@delete');  


 		//角色
		Route::get('admin/roles/access/{role}','RolesController@access')->name('roles.access');
		Route::post('admin/roles/group-access/{role}','RolesController@groupAccess')->name('roles.group-access');
		Route::resource('admin/roles','RolesController',['only'=>['index','create','store','update','edit','destroy'] ]); 

		//权限
		Route::get('admin/rules/status/{status}/{rules}','RulesController@status')->name('rules.status');
		Route::resource('admin/rules','RulesController',['only'=> ['index','create','store','update','edit','destroy'] ]);  

		//项目筛选
		Route::get('admin/article/infos','AdminController@ArticleInfos')->name('admin_articles');
		//清空通知
		Route::get('/clearnotification','AdminController@NotificationClear');

		//系统配置
		Route::get('info','InfoController@Index')->name('infos_edit');
		Route::post('info','InfoController@PostIndex')->name('infos_edit');
		//单页
		Route::get('spageindex','InfoController@spageIndex')->name('spage');
		Route::get('/spage/edit/{id}','InfoController@spageUpdate')->name('spageupdate');
		Route::post('/spage/edit/{id}','InfoController@spagePostUpdate')->name('spage_pupdate');
		Route::get('/spage/create','InfoController@spageCreate')->name('spagecrete');
		Route::post('/spage/create','InfoController@spagePostCreate')->name('spage_pspagecrete');

		Route::get('/loglogs','InfoController@logs')->name('logs');
		Route::get('/downlogs/{url}','InfoController@downlogs')->name('downlogs');

		//友链
		Route::get('linkindex','LinkController@index');
		Route::get('/link/edit/{id}','LinkController@linkUpdate');
		Route::post('/link/edit/{id}','LinkController@linkPostUpdate')->name('link_pupdate');
		Route::get('/link/create','LinkController@linkCreate');
		Route::post('/link/create','LinkController@linkPostCreate');
		Route::get('/link/delete/{id}','LinkController@delete');




		
		Route::get('/captcha/{config?}','CaptchasController@Captchas');


		    Route::get('allurls','CheckToolsController@cheakUrls');
		    Route::get('checkbrandsurls','CheckToolsController@checkbrandsurls');
		    Route::get('/check/updatebrands','CheckToolsController@updateBrands');
		    Route::get('/check/updatemipcache','CheckToolsController@updateMipCache');

		});
});
