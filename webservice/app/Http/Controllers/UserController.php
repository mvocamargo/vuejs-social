<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request){
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
            $user->imagem = asset( $user->imagem );
            return $user;
        }else{
            return ['status' => false];
        }
        
        //Cria um token para usuário com base no e-mail e retorna esse token
        $user->token = $user->createToken($user->email)->accessToken;

        return $user;
    }

    public function cadastro(Request $request){
        $data = $request->all();

        $validation = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if( $validation->fails() ){
            return $validation->errors();
        }
        
        $imagem = "/perfis/perfil_padrao.png";

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'imagem' => $imagem
        ]);
        
        //Cria um token para usuário com base no e-mail e retorna esse token
        $user->token = $user->createToken($user->email)->accessToken;
        $user->imagem = asset( $user->imagem );

        return $user;
    }

    public function usuario(Request $request){
        return $request->user();
    }

    public function perfil(Request $request){
        $user = $request->user();
        $data = $request->all();

        if( isset($data['password']) ){
            $validation = Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($user->id)],
                'password' => 'required|string|min:6|confirmed',
            ]);

            if( $validation->fails() ){
                return $validation->errors();
            }
            $user->password = bcrypt( $data['password'] );
        }else{
            $validation = Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => ['required','string','email','max:255', Rule::unique('users')->ignore($user->id)],
            
                ]);
            if( $validation->fails() ){
                return $validation->errors();
            }

            $user->name = $data['name'];
            $user->email = $data['email'];
        }

        if( isset( $data['imagem'] ) ){


            Validator::extend('base64image', function ($attribute, $value, $parameters, $validator) {
                $explode = explode(',', $value);
                $allow = array('png', 'jpg', 'svg', 'jpeg');
                $format = str_replace(
                    ['data:image/', ';', 'base64'],
                    ['', '', ''],
                    $explode[0]
                );
                if(!in_array($format, $allow)){
                    
                    return false;
                }

                if(!preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $explode[1])) {
                    return false;
                }
                return true;
            });

            $validation = Validator::make($data, [
                'imagem' => 'base64image',
            ], ['base64image' => 'Imagem Inválida']);

            if( $validation->fails() ){
                return $validation->errors();
            }

            $time = time();
            $diretorioPai = 'perfis';
            $diretorioImagem = $diretorioPai.DIRECTORY_SEPARATOR.'perfil_id_'.$user->id;
            $ext = substr($data['imagem'], 11, strpos( $data['imagem'], ';' ) -11 );
            $urlImagem = $diretorioImagem.DIRECTORY_SEPARATOR.$time.'.'.$ext;

            $file = str_replace('data:image/'.$ext.';base64,', '', $data['imagem']);
            $file = base64_decode($file);

            if( !file_exists( $diretorioPai ) ){
                mkdir( $diretorioPai, 0700 );
            }

            // Caso já exista uma imagem para o usuário, remove a mesma
            if( $user->imagem ){
                if( file_exists($user->imagem) ){
                    unlink($user->imagem);
                }
            }

            if( !file_exists( $diretorioImagem ) ){
                mkdir( $diretorioImagem, 0700 );
            }

            file_put_contents( $urlImagem, $file );

            $user->imagem = $urlImagem;
        }

        $user->save();

        $user->imagem = asset( $user->imagem );
        $user->token = $user->createToken($user->email)->accessToken;
        return $user;
    }    
}
