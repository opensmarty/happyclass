<?php

namespace App\Api\Controllers\Auth;

use App\Api\Controllers\BaseController as Controller;
use App\Models\User;
use Dingo\Api\Exception\StoreResourceFailedException;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterController extends Controller
{
    use RegistersUsers;

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            throw new StoreResourceFailedException("Validation Error", $validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        if ($user) {
            $token = JWTAuth::fromuser($user);
            return $this->response->array([
                "token" => $token,
                "message" => "Registration Success",
                "status_code" => 201
            ]);
        } else {
            $this->sendFailResponse("Register Error");
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|unique:users|max:10',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
    }

    public function sendFailResponse($message)
    {
        return $this->response->error($message, 400);
    }
}
