<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$response = Http::get('https://api.currencyfreaks.com/currency-symbols');
  
    	$jsonData = $response->json();
		
		return response()->json(['result'=>$jsonData]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mbarang  $mbarang
     * @return \Illuminate\Http\Response
     */
    public function show($trip)
    {
        $response = Http::get('https://api.currencyfreaks.com/latest?apikey=188cde3dc51a4b018401c9674ca0561e');
  
    	$jsonData = $response->json();
		

		
		return response()->json(['result'=>$jsonData['rates'][$trip]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mbarang  $mbarang
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mbarang  $mbarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mbarang  $mbarang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
