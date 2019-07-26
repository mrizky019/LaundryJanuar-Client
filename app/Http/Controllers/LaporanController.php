<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class LaporanController extends Controller
{
    public function getTransaksiCabang(Request $request)
    {
    	$client = new Client();

    	$url = "http://pdt1.himastika.me/api/laporan/getTransaksiCabang";
    	$p_date_from = $request->p_date_from;
    	$p_date_to = $request->p_date_to;

    	$response = $client->get($url, [
    		'query' => [
    			'p_date_from' => $request->p_date_from,
    			'p_date_to'	=>	$request->p_date_to
    		]
    	])->getBody()->getContents();

    	$obj = json_decode($response, true);

    	return view('transaksi')->with('data', $obj['data']);
    }

    public function getStockCabang(Request $request)
    {
    	$client = new Client();

    	$url = "http://pdt1.himastika.me/api/laporan/getStockCabang";

    	$id_cabang = $request->id_cabang;

    	$response = $client->get($url,[
    		'query' => [
    			'id_cabang' => $id_cabang
    		]
    	])->getBody()->getContents();

    	$obj = json_decode($response, true);

    	return view('cabang')->with('data', $obj['data']);
    }
}
