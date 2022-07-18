<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Currency;

class updateCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Currency';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::get('https://api.currencyfreaks.com/latest?apikey=188cde3dc51a4b018401c9674ca0561e');
  
    	$jsonData = $response->json();
		
		$responseX = Http::get('https://api.currencyfreaks.com/currency-symbols');
  
    	$jsonDataX = $responseX->json();
		
		$j="";
		$ins = 0;
		$checkUp  = 0;
		$date = date('Y-m-d h:i:s', strtotime($jsonData['date']));
		foreach($jsonData['rates'] as $k=>$v){
			
			$ins = 1;
			
			$j = NULL;
			if (isset($jsonDataX[$k])) {
			   $j = $jsonDataX[$k];
			 }; 
			$getData = Currency::select(['id'])->where('date',$date)->where('code',$k)->get(); 
			
			if (is_object($getData) or is_array($getData) or ($getData instanceof Traversable)){
				if(isset($getData[0])){
					Currency::where('id',$getData[0]->id)->update(
						['name'=>$j,'code' => $k,'rate' => $v]
					);
					$ins = 0;
					$checkUp = 1;
				}
			}
			if($ins){
				 Currency::insert(
					['name'=>$j,'code' => $k,'rate' => $v,'date' => $date]
				);
			}
		}
		
		if($checkUp)
		{
			echo "Update data";
		}
		else
		{
			echo "Insert data";
		}
		
		
    }
}
