<?php

use App\Models\Order;
use App\Models\Slide;
use App\Models\Article;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SlidesController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;

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

Route::get('/', function (Request $request) {
    $slides = Slide::take(4)->get();   //po i thirr ne kete variabel slides prej db edhe shfaqi 3 slide
    $products = Product::paginate(4);
    $categories = Category::get();

    if(isset($request->search) && strlen($request->search) > 1) {
        $products = Product::where('name', 'LIKE', '%'.$request->search.'%')->paginate(4);
    }

    return view('home',[
        'slides' => $slides,    //edhe slides ja dergone te home me u shfaq sliderat
        'products' => $products,
        'categories' => $categories,
    ]);


})->name('home');




Route::get('/shop', function (Request $request) {
    $products = Product::paginate(6);

    if(isset($request->search) && strlen($request->search) > 1) {
        $products = Product::where('name', 'LIKE', '%'.$request->search.'%')->paginate(6);
    }

    if(isset($request->sort) && !empty($request->sort)) {
        $sort_parts = explode("_", $request->sort); // name_asc  ['name', 'asc']
        $column = $sort_parts[0];
        $value =  $sort_parts[1];

        if($column === 'name') {
            $products = Product::orderBy('name', $value)->paginate(6);
        } elseif($column === 'price') {
            $products = Product::orderBy('price', $value)->paginate(6);
        }
    }

    return view('shop', [
        'products' => $products
    ]);
})->name('shop');



Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('categories', CategoriesController::class);
});


Route::resource('slides', SlidesController::class)->middleware('role:admin');
Route::resource('products', ProductsController::class);
Route::get('products/category/{id}', [ProductsController::class, 'getProductsByCategory']);
Route::resource('orders', OrdersController::class)->only(['index', 'destroy']);

Route::resource('/comment', CommentController::class);

//CART
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/{product}/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/{item}/inc', [CartController::class, 'inc'])->name('cart.inc');
Route::get('/cart/{item}/dec', [CartController::class, 'dec'])->name('cart.dec');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        if(!Auth::user()->hasRole('admin')) {
            $orders = Order::where('user_id', Auth::id())->count();
        } else {
            $orders = Order::count();
        }

        return view('dashboard', [
            'slides' => Slide::count(),
            'products' => Product::count(),
            'orders' => $orders
        ]);
    })->name('dashboard');
});
