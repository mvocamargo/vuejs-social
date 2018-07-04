<?php

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/cadastro', function (Request $request){
    $data = $request->all();

    $validation = Validator::make($data, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    if( $validation->fails() ){
        return $validation->errors();
    }
    
    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password'])
    ]);
    
    //Cria um token para usuário com base no e-mail e retorna esse token
    $user->token = $user->createToken($user->email)->accessToken;

    return $user;
});

Route::post('/login', function (Request $request){
    $data = $request->all();
    $email = $data['email'];
    $password = $data['password'];

    $validation = Validator::make($data, [
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|',
    ]);

    if( $validation->fails() ){
        return $validation->errors();
    }
    
    if( Auth::attempt(['email' => $email, 'password' => $password]) ){
        $user = auth()->user();
        $user->token = $user->createToken($user->email)->accessToken;
        return $user;
    }else{
        return ['status' => false];
    }
    
    //Cria um token para usuário com base no e-mail e retorna esse token
    $user->token = $user->createToken($user->email)->accessToken;

    return $user;
});

Route::middleware('auth:api')->get('/usuario', function (Request $request) {
    return $request->user();
});
