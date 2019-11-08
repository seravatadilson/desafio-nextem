<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class ApiController extends Controller
{
    //
    public $loginSigin = true;


    public function login(Request $request) {
        
        //$input = $request->only('email', 'password');
        $token = null;

        if(!$token = JWTAuth::attempt(['email' => $request->email, 'password' => $request->password, 'isAdmin' => 1])){

            //Caso haja falha no login method http 401 -> não autorizzado
            return response()->json([
                'sucess' => false,
                'message' => 'E-mail ou senha invalida',
            ], 401);
        }

        // retorno, caso usuario seja autenticado com sucesso, pelo JWTAuth::atttempt
        return response()->json([
            'sucess'=> true,
            'token' => $token,
        ]);
    }

    public function registrar(RegisterFormRequest $request){
        
        $user = new User();

        $user->create([
            'name'=> $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($this->loginAfterSignUp) {
            return $this->login($request);
        }

        return response()->json([
            'success'   =>  true,
            'data'      =>  $user
        ], 200);
    }

    public function logout(Request $request){
        $this->validate(
            $request, [
                'token'=>'required'
            ]
        );
        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $except) {
            //throw $th;
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }

    }

}
