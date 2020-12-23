<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $links = \App\Link::all();

    //return view('welcome', ['links' => $links]);
    //or
    //return view('welcome')->with('links', $links);
    //or
    //return view('welcome')->withLinks($links);
    //or
    //return view('welcome', compact('links'));
});

Route::get('/submit', function () {
    return view('submit');
});


Route::post('/submit', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'url' => 'required|url|max:255',
        'description' => 'required|max:255',
    ]);

    //ver 1 :
    // $link = new \App\Link;
    // $link->title = $data['title'];
    // $link->url = $data['url'];
    // $link->description = $data['description'];

    // $link->save();

    //ver 2
    $link = new \App\Link($data);
    $link->save();

    return $link;

    //ver 3:
    //this is a syntactic sugar for the above ones:
    //$link = tap(new App\Link($data))->save();

    return redirect('/');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
