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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

///////////////RUTAS PARA DISTRITOS
Route::get('/districts', 'DistrictController@index')->name('district');
Route::get('/districts/{id}', 'DistrictController@show')->name('district.show');
Route::post('/districts/edit/{id}', 'DistrictController@edit')->name('district.show');
Route::post('/districts', 'DistrictController@save')->name('district.save');
Route::post('/districts/delete/{id}', 'DistrictController@delete')->name('district.delete');

///////////////RUTAS PARA TIPOS DE TIENDA
Route::get('/types', 'TypeController@index')->name('type');
Route::get('/types/{id}', 'TypeController@show')->name('type.show');
Route::post('/types/edit/{id}', 'TypeController@edit')->name('type.show');
Route::post('/types', 'TypeController@save')->name('type.save');
Route::post('/types/delete/{id}', 'TypeController@delete')->name('type.delete');

///////////////RUTAS PARA PASILLOS
Route::get('/aisles', 'AisleController@index')->name('aisle');
Route::get('/aisles/{id}', 'AisleController@show')->name('aisle.show');
Route::post('/aisles/edit/{id}', 'AisleController@edit')->name('aisle.show');
Route::post('/aisles', 'AisleController@save')->name('aisle.save');
Route::post('/aisles/delete/{id}', 'AisleController@delete')->name('aisle.delete');

///////////////RUTAS PARA CATEGORIAS
Route::get('/categories', 'CategoryController@index')->name('category');
Route::get('/categories/{id}', 'CategoryController@show')->name('category.show');
Route::post('/categories/edit/{id}', 'CategoryController@edit')->name('category.show');
Route::post('/categories', 'CategoryController@save')->name('category.save');
Route::post('/categories/delete/{id}', 'CategoryController@delete')->name('category.delete');
Route::get('/categories/search/{id}', 'CategoryController@search')->name('category.search');

///////////////RUTAS PARA CATEGORIAS DE TIENDAS
Route::get('/category/stores', 'CategoryController@indexStore')->name('category.store');
Route::get('/category/stores/{id}', 'CategoryController@showStore')->name('category.store.show');
Route::post('/category/stores/edit/{id}', 'CategoryController@editStore')->name('category.store.show');
Route::post('/category/stores', 'CategoryController@saveStore')->name('category.store.save');
Route::post('/category/stores/delete/{id}', 'CategoryController@deleteStore')->name('category.store.delete');
Route::get('/category/stores/search/{id}', 'CategoryController@searchStore')->name('category.store.search');

///////////////RUTAS PARA TIENDAS
Route::get('/stores', 'StoreController@index')->name('store');
Route::get('/stores/{id}', 'StoreController@show')->name('store.show');
Route::post('/stores/edit/{id}', 'StoreController@edit')->name('store.show');
Route::post('/stores', 'StoreController@save')->name('store.save');
Route::post('/stores/delete/{id}', 'StoreController@delete')->name('store.delete');

///////////////RUTAS PARA PRODUCTOS
Route::get('/products', 'ProductController@index')->name('product');
Route::get('/products/{id}', 'ProductController@show')->name('product.show');
Route::post('/products/edit/{id}', 'ProductController@edit')->name('product.show');
Route::post('/products', 'ProductController@save')->name('product.save');
Route::post('/products/delete/{id}', 'ProductController@delete')->name('product.delete');
Route::get('/products/search/{id}', 'ProductController@search')->name('product.search');

///////////////RUTAS PARA PRODUCTOS DE TIENDAS
Route::get('/product/stores', 'ProductController@indexStore')->name('product.store');
Route::get('/product/stores/{id}', 'ProductController@showStore')->name('product.store.show');
Route::post('/product/stores/edit/{id}', 'ProductController@editStore')->name('product.store.show');
Route::post('/product/stores', 'ProductController@saveStore')->name('product.store.save');
Route::post('/product/stores/delete/{id}', 'ProductController@deleteStore')->name('product.store.delete');
Route::get('/product/stores/search/{id}', 'ProductController@searchStore')->name('product.store.search');

///////////////RUTAS PARA PROVEDORES
Route::get('/providers', 'ProviderController@index')->name('provider');
Route::get('/providers/{id}', 'ProviderController@show')->name('provider.show');
Route::post('/providers/edit/{id}', 'ProviderController@edit')->name('provider.show');
Route::post('/providers', 'ProviderController@save')->name('provider.save');
Route::post('/providers/delete/{id}', 'ProviderController@delete')->name('provider.delete');

///////////////Rutas para ORDENES


/////////////////RUTAS CATEGORIAS DE RECETAS//
Route::get('/recipes/category', 'RecipeCategoryController@index')->name('recipe.category');
Route::post('/recipes/category', 'RecipeCategoryController@saveCategory')->name('recipe.category.save');
Route::post('/recipes/subcategory', 'RecipeCategoryController@saveSub')->name('recipe.category.save.sub');
Route::get('/recipes/categories/search/{id}', 'RecipeCategoryController@search')->name('recipe.category.search');
Route::get('/recipes/subcategory/show/{id}', 'RecipeCategoryController@show')->name('recipe.show');
Route::post('/recipes/subcategory/edit/{id}', 'RecipeCategoryController@edit')->name('recipe.edit');
Route::post('/recipes/subcategory/delete/{id}', 'RecipeCategoryController@delete')->name('recipe.delete');





/////////////////RUTA PARA RECETAS////////////////
Route::get('/recipes', 'RecipeController@index')->name('recipe');
Route::get('/recipes/create/{id}', 'RecipeController@indexSave')->name('recipe.create.index');
Route::get('/recipes/create/search/product', 'RecipeController@searchProduct')->name('recipe.create.search');
Route::get('/recipes/create/select/product', 'RecipeController@selectProduct')->name('recipe.create.select');
Route::post('/recipes/create/{id}', 'RecipeController@recipeSave')->name('recipe.create.save');







