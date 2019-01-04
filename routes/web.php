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
Route::get('/', function() {
	return redirect()->route('login');
});
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
	//Product
	Route::get('product/create', function() {
		return view('user.product.create');
	})->name('product.create');
	Route::post('product/store', function(App\Http\Requests\ProductFormRequest $request) {
		$expiry_date = $currentDate = \Carbon\Carbon::now()->addDays($request->expiry_date)->format('Y-m-d');
		$newProduct = App\Product::create([
			'name' => $request->name,
			'vipon_link' => $request->vipon_link,
			'amazon_link' => $request->amazon_link,
			'sold_price' => $request->sold_price,
			'item_cost' => $request->item_cost,
			'code' => $request->code,
			'note' => $request->note,
			'expiry_date' => $expiry_date,
		]);

		$user = Auth::user();

		if (isset($newProduct)) {
			$newNoti = App\Notification::create([
				'checked' => false,
				'content' => '<strong><i>'.$user->name.'</i></strong> creared new product: '.'<strong>'.$newProduct->name.'</strong>',
				'product_id' => $newProduct->id,
				'user_id' => $user->id
			]);
		}
		return redirect()->route('product.index')->with('message', 'Created successfully!');
	})->name('product.store');
	Route::get('product/index', function() {
		$products = App\Product::paginate(10);
		return view('user.product.index', ['products' => $products]);
	})->name('product.index');
	Route::delete('product/{product_id}', function($product_id){
		$product = App\Product::findOrFail($product_id);
		if ($product->delete()) {
			return redirect()->route('product.index')->with('message', 'Deleted successfully!');
		}
	})->name('product.delete');;

	// Route for checking
	Route::get('checkRoute', function() {
		return Session::get('savingAuthPassport');
	});
});