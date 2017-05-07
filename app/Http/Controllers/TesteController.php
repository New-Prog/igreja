<?php

namespace App\Http\Controllers;


use App\Services\LocationService;
use App\Reuniao;

class TesteController extends Controller
{
	protected $reuniao;
	
	public function __construct(Reuniao $reuniao)
	{
		$this->reuniao = $reuniao;
	}
	
	public function  getCordinates() {
		$address = 'Av Paulista 2202';
		$address = str_replace(" ", "+", $address);
		
		$location =  new LocationService();
		dd($location->getCordinates($address));
	}
}
