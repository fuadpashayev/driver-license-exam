<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  /**
   * Create a new AuthController instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth:api', ['except' => ['login','register']]);
  }

  /**
   * Get a JWT via given credentials.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function login(Request $request)
  {
      $credentials = $request->only(['email', 'password']);

      if (! $token = auth('api')->attempt($credentials)) {
          return response()->json(['status'=>'error','error' => 'Unauthorized'], 401);
      }

      return $this->respondWithToken($token);
  }

  public function register(Request $request){
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:6', 'confirmed'],
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password)
    ]);

    $user->attachRole("user");

    return $this->login($request);
  }


  /**
   * Get the authenticated User.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function me()
  {
      $user = auth('api')->user();

      $data = [
          "status"=>"success",
          "id"=>$user->id,
          "name"=>$user->name,
          "email"=>$user->email,
          "payment_type"=>$user->payment_type
      ];
      checkPaymentTime($user->id);
      return response()->json($data,200,["Accept"=>"application/json; charset=utf-8","Content-type"=>"application/json; charset=utf-8"],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
  }

  /**
   * Log the user out (Invalidate the token).
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function logout()
  {
      auth('api')->logout();

      return response()->json(['status'=>'success','message' => 'Successfully logged out'],200,["Accept"=>"application/json; charset=utf-8","Content-type"=>"application/json; charset=utf-8"],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
  }

  /**
   * Refresh a token.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function refresh()
  {
      return $this->respondWithToken(auth('api')->refresh());
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
      $user = auth('api')->user();
      checkPaymentTime($user->id);
      return response()->json([
          'status'=>'success',
          'id'=>$user->id,
          'name'=>$user->name,
          'email'=>$user->email,
          "payment_type"=>$user->payment_type,
          'access_token' => $token,
          'token_type' => 'bearer',
          'expires_in' => auth('api')->factory()->getTTL() * 60
      ],200,["Accept"=>"application/json; charset=utf-8","Content-type"=>"application/json; charset=utf-8"],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
  }


}
