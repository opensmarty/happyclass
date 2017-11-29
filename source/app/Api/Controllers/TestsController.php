<?php

namespace App\Api\Controllers;

use Illuminate\Http\Request;
use App\Api\Controllers\BaseController as Controller;

class TestsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('jwt.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return json_encode(Test::all());
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
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return $this->response->error($validator->errors(), 400);
        } else {

            $ret = Test::create([
                'title' => $request->title,
                //'content' => $request->content,
                'tag' => $request->tag
            ]);
            if ($ret) {
                return $this->sendSuccessResponse("Create Success", 201);
            } else {
                return $this->sendFailResponse("Create Fail", 500);
            }
        }
    }

    public function me()
    {
        return Auth::guard('api')->user();
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
        $data = Test::findOrFail($id);
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return $this->sendFailResponse($validator->errors(), 400);
        } else {
            $data->title = $request->title;
            //$data->content = $request->content;
            $data->tag = $request->tag;
            if ($data->save()) {
                return $this->sendSuccessResponse("Update Success", 201);
            } else {
                return $this->sendFailResponse("Update Fail", 500);
            }
        }
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
        //
        if (Test::destroy($id) === 1) {
            return $this->sendSuccessResponse("Delete Success", 201);
        } else {
            return $this->sendFailResponse("Delete Fail", 500);
        }
    }

    protected function validator($data)
    {
        return Validator::make($data, [
            'title' => 'required|max:30|unique:tests',
            'content' => 'required',
        ]);
    }

    protected function sendSuccessResponse($message, $status_code)
    {
        return $this->response->array([
            'message' => $message,
            'status_code' => $status_code
        ]);
    }

    protected function sendFailResponse($message, $status_code)
    {
        return $this->response->error($message, $status_code);
    }
}
