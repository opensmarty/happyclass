<?php

namespace App\Api\Controllers;

use App\Api\Controllers\BaseController as Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Auth;


class UsersController extends Controller
{
    public function __construct()
    {
//        $this->middleware('jwt.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return json_encode(User::all());
//        $user = $this->auth->user();

//        return $user;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return "create view";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function me()
    {
//        return Auth::guard('api')->user();
        $user = $this->auth->user();
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        return json_encode(Test::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return "edit view";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get the token from the request.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function token(Request $request)
    {
        $credentials = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];

        try {
            if (!$token = Auth::guard('api')->attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }

    /**
     * @return mixed
     */
    public function refresh()
    {
        $old_token = JWTAuth::gettoken();    //获取过期token
        $new_token = JWTAuth::refresh($old_token);    //刷新token并返回
        JWTAuth::invalidate($old_token);    //销毁过期token
        return $this->response->array([
            'token' => $new_token,
            'status_code' => 201
        ]);
    }

}
