<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    public function login(Request $request)
    {
    	$client = new CLient();
    	$url = "http://127.0.0.1:8000/api/auth/login";

    	$email = $request->email;
    	$password = $request->password;

    	$response = $client->post($url, [
    		'query' => [
    			'email' => $email,
    			'password' => $password
    		]
    	])->getBody()->getContents();

    	$obj = json_decode($response, true);

    	return view('auth.home')->with('data', $obj['data']);
    }
}
