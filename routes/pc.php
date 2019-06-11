<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['domain' => 'm.imnotdoubi.test'], function () {
    Route::get('/','WapIndexController@Index');	
    Route::get('/news/{id}.html','WapArticleController@GetNews')->where('id', '[0-9]+')->name('news');
    // Route::get('/pnews/{id}.html','WapArticleController@GetPnews')->where('id', '[0-9]+')->name('pnews');
	Route::get('/women','WapListController@about')->name('danpage');
	Route::get('/mianze','WapListController@about')->name('danpage');
	Route::get('/tousu','WapListController@about')->name('danpage');
	Route::get('/tags','WapListController@about')->name('danpage');
	Route::get('/map','WapListController@about')->name('danpage');
	Route::get('/search','WapListController@jiansuo')->name('jians');
	Route::get('/xm','WapListController@listXm')->name('xiangmu');
	Route::get('/xm/page/{page}','WapListController@listXm')->name('xiangmu');
	Route::get('/tag/{tags}','WapListController@tags')->name('taglist');
	Route::get('/tag/{tags}/page/{page}','WapListController@tags')->name('tagspagelist');
	Route::get('{path}','WapListController@index')->where('path','[a-z]+')->name('newslist');
	Route::get('{path}/page/{page}','WapListController@index')->where('path', '[a-z]+')->name('newspagelist');
	Route::get('{path}/{fpath}','WapListController@flists')->where('path','[a-z]+')->name('newslist');
	Route::get('{path}/{fpath}/page/{page}','WapListController@flists')->where('path','[a-z]+')->name('newslist');
	Route::get('{id}.html','WapArticleController@GetArticles')->where('id', '[0-9]+')->name('news');
	Route::get('/clearCache', 'WapIndexController@clearCache');

});

Route::get('/','IndexController@Index');
Route::get('/news/{id}.html','ArticleController@GetNews')->where('id', '[0-9]+')->name('news');
// Route::get('/pnews/{id}.html','ArticleController@GetPnews')->where('id', '[0-9]+')->name('pnews');
Route::get('/women','ListController@about')->name('danpage');
Route::get('/mianze','ListController@about')->name('danpage');
Route::get('/tousu','ListController@about')->name('danpage');
Route::get('/tags','ListController@about')->name('danpage');
Route::get('/map','ListController@about')->name('danpage');
Route::get('/search','ListController@jiansuo')->name('jians');
Route::get('/xm','ListController@listXm')->name('xiangmu');
Route::get('/xm/page/{page}','ListController@listXm')->name('xiangmu');
Route::any('/ajax/mjiansuo', 'ListController@ajaxSearch');
Route::get('/tag/{tags}','ListController@tags')->name('taglist');
Route::get('/tag/{tags}/page/{page}','ListController@tags')->name('tagspagelist');
Route::get('{path}','ListController@index')->where('path','[a-z]+')->name('newslist');
Route::get('{path}/page/{page}','ListController@index')->where('path', '[a-z]+')->name('newspagelist');
Route::get('{path}/{fpath}','ListController@flists')->where('path','[a-z]+')->name('newslist');
Route::get('{path}/{fpath}/page/{page}','ListController@flists')->where('path','[a-z]+')->name('newslist');
Route::get('{id}.html','ArticleController@GetArticles')->where('id', '[0-9]+')->name('xm');
Route::get('/clearCache', 'IndexController@clearCache');

// Route::get('/sitemap.html','IndexController@sitemap');
// Route::get('/{about}.html','IndexController@about')->where('about','about|shengming|guwen|shanchu|lianxi');
// Route::get('/xiangmu','ListController@listXm')->where('path','[a-z]+')->name('xmlist');

