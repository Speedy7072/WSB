<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/wsb', function () {
    //return view('wsb');
   // return ['name' => 'Janusz', 'surname' => 'Nowak'];
    return view('wsb',['name' => 'Janusz', 'surname' => 'Nowak']); 
});

Route::get('/pages/{x}', function ($x) {
    $pages = [
        'about' => 'Informacje o stronie',
        'home' => 'Strona domowa',
        'contact' => 'jan@o2.pl'
    ];

    return $pages[$x];
});

Route::get('/address/{city?}/{street?}/{zipCode?}', function (string $city="Brak danych",  string $street="-", int $zipCode=null) {
    $zipCode=substr($zipCode, 0, 2)."-".substr($zipCode, 2, 3);
    echo <<< L
        <hr>
        Kod pocztowy: $zipCode, Miasto: $city, ul: $street <br>
        <hr>
    L;
})->name('address');

Route::redirect('adres', 'address');
Route::redirect('/adres/{city?}/{street?}/{zipCode?}', '/address/{city?}/{street?}/{zipCode?}');

Route::get('admin/home/{name}',function($name){
    echo"Witaj na stronie administracyjnej"
});

Route::get('admin/users',function(){
    
});