<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TestController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Test Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the test case for the application.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

//
    public function index()
    {
        echo 'This action is used for testing laravel';
    }

    public function http()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
        echo $res->getStatusCode();
// 200
        echo $res->getHeaderLine('content-type');
// 'application/json; charset=utf8'
        echo $res->getBody();
    }
}
