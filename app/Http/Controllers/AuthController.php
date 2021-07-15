<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Validator;
use App\UserRole;
use App\User;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['register','login']]);
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth ("api")->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
            
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $ue=auth("api")->user();
        $user = User:: with(["userRole" =>function($query){
            $query->with("role");
        }])->where('id',$ue->id)->first();

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth("api")->factory()->getTTL() * 60,
            'user' => $user 
        ]);
    }

      public function register(Request $request){

         $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'role_id'=>'required',
            'nom_user'=>'required|string',
            'prenom_user'=>'required|string',
             'password' => 'required|string|min:6',
        ]);

          if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
         $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'role_id' => $request->get('role_id'),
                'nom_user' => $request->get('nom_user'),
                'prenom_user' => $request->get('prenom_user'),
                'password' => Hash::make($request->get('password')),
            ]);
        //  $code=$this->random(5);
        // $user = User::create(array_merge(
        //     $validator->validated(),
        //     ['password' => bcrypt($code)]
        // ));
        $role=new UserRole();
        $role->user_id=$user->id;
        $role->role_id=$request->input("role_id");
        $role->save();

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user,
        ], 201);

      }

      protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

     public function random($car)
    {
        $string = "";
        $chaine = "12345678910ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        srand((double)microtime()*100);
        for($i=0; $i<$car; $i++)
        {
            $string .= $chaine[rand()%strlen($chaine)];
        }
        return $string;
    }
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
       // return Auth::guard();
    }
}