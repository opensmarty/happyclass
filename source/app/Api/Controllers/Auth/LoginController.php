<?php

namespace App\Api\Controllers\Auth;

use App\Api\Controllers\BaseController as Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {

        $user = User::where('email', $request->email)->orWhere('name', $request->email)->firstOrFail();

        if ($user && Hash::check($request->get('password'), $user->password)) {
            //获取token
            $token = JWTAuth::fromUser($user);
            $this->clearLoginAttempts($request);
            return $this->response->array([
                'token' => $token,
                'message' => "Login Success",
                'status_code' => 200
            ]);
        } else {
            throw new UnauthorizedHttpException("Login Failed");

        }
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        $this->guard()->logout();
    }
}
