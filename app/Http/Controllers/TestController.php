<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;

class TestController extends Controller
{
    public function getUsers()
    {
    	$client = new Client();

    	$url = "http://127.0.0.1:8000/api/admin";

    	$response = $client->get($url, [
    		
    	]);

    	return
    }
}
